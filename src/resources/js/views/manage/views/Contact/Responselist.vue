<template>
    <div v-if="state.currentData.length === 0" class="has-text-centered">
        <h1 class="title mb-6">No Data Found</h1>
    </div>
    <div style="display: inherit" v-else>
        <div class="table-container">
            <table class="table is-fullwidth">
                <div class="loading-cover-dark" v-if="state.loading" data-aos="fade-in">
                    <Icon class="has-text-white is-large" icon="fas fa-spinner fa-spin fa-3x"/>
                </div>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date Sent</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in state.currentData" :key="item.id" data-aos="fade-in">
                    <td>{{ item.Name }}</td>
                    <td><a :href="'mailto:'+item.Email+'?subject=Re: '+item.Subject" target="_blank">{{
                            item.Email
                        }}</a>
                    </td>
                    <td>{{ truncate(item.Subject, 30) }}</td>
                    <td>
                        <Timestamp :diffForHumans="true" :timestamp="item.created_at"/>
                    </td>
                    <td class="has-text-centered">
                        <button @click="viewMessage(item.id)" class="button is-primary is-small mx-1"
                                :class="{'is-loading':state.modal.loading===item.id}">
                            <Icon icon="fas fa-book-open"/>
                        </button>
                        <Can permission="Contact.Delete">
                            <button @click="del(item.id)" class="button is-danger is-small mx-1"
                                    :class="{'is-loading':state.del_loading===item.id}">
                                <Icon icon="fas fa-trash"/>
                            </button>
                        </Can>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <nav class="pagination" role="navigation" aria-label="pagination">
            <button @click="fetch(state.page-1)" class="button pagination-previous"
                    :disabled="state.prev_page_url != null ? null : 'disabled'">
                <Icon icon="fas fa-arrow-left"/>
            </button>
            <button @click="fetch(state.page)" class="button pagination-previous">
                <Icon icon="fas fa-sync"/>
            </button>
            <button @click="fetch(state.page+1)" class="button pagination-next"
                    :disabled="state.next_page_url != null ? null : 'disabled'">
                <Icon icon="fas fa-arrow-right"/>
            </button>
            <ul class="pagination-list">
                <li v-for="index in state.last_page">
                    <a class="pagination-link" :class="{'is-current':index === state.page}"
                       @click="fetch(index)">{{ index }}</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="modal is-active" v-if="state.modal.active" data-aos="fade-in">
        <div class="modal-background" @click="state.modal.active = false"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Message from {{ state.modal.header }}</p>
                <button class="delete" aria-label="close" @click="state.modal.active = false"></button>
            </header>
            <section class="modal-card-body">
                <strong>{{ state.modal.subject }}</strong>
                <br>
                {{ state.modal.body }}
            </section>
            <footer class="modal-card-foot">
                <a class="button is-primary" :href="'mailto:'+state.modal.email+'?subject=Re: '+state.modal.subject"
                   target="_blank">
                    <Icon icon="fas fa-reply"/>
                    <span>Reply</span>
                </a>
                <Can permission="Contact.Delete">
                    <button class="button is-danger" @click="del(state.modal.messageid)"
                            :class="{'is-loading':state.del_loading===state.modal.messageid}">
                        <Icon icon="fas fa-trash"/>
                        <span>Delete</span>
                    </button>
                </Can>
                <button class="button" @click="state.modal.active = false">
                    <Icon icon="fas fa-times"/>
                    <span>Close</span>
                </button>
            </footer>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Icon from "../../../../components/text/Icon";
import Can from "../../../../components/helpers/Can";
import Timestamp from "../../../../components/text/Timestamp";
import {POSITION, useToast} from "vue-toastification";
import httpError from "../../../../components/helpers/httpError"

export default {
    name: "Responselist",
    components: {Timestamp, Can, Icon},
    beforeMount() {
        this.fetch(this.state.page);
    },
    data() {
        return {
            state: {
                loading: false,
                del_loading: null,
                page: 1,
                currentData: {},
                next_page_url: null,
                prev_page_url: null,
                last_page: null,
                modal: {
                    active: false,
                    body: "No message loaded",
                    header: "No message loaded",
                    messageid: null,
                    subject: null,
                    email: null,
                    loading: null
                }
            },
        }
    },
    methods: {
        fetch(page) {
            this.state.loading = true
            axios.get("/app/manage/contact-form/", {params: {"page": page}}).then(res => {
                this.state.currentData = res.data.data
                this.state.page = res.data.current_page
                this.state.next_page_url = res.data.next_page_url
                this.state.prev_page_url = res.data.prev_page_url
                this.state.last_page = res.data.last_page
                this.state.loading = false
            })
                .catch(error => {
                    this.httpError(error)
                });
        },
        truncate(string, num) {
            if (string.length <= num) {
                return string
            }
            return string.slice(0, num) + '...'
        },
        viewMessage(id) {
            this.state.modal.loading = id
            axios.get("/app/manage/contact-form/" + id).then(res => {
                this.state.modal.body = res.data.Message
                this.state.modal.header = res.data.Name
                this.state.modal.messageid = res.data.id
                this.state.modal.subject = res.data.Subject
                this.state.modal.email = res.data.Email
                this.state.modal.active = true
                this.state.modal.loading = null
            })
                .catch(error => {
                    this.httpError(error)
                });
        },
        del(id) {
            this.state.del_loading = id
            axios.delete("/app/manage/contact-form/" + id, {data: {page: this.state.page}})
                .then(res => {
                    this.state.del_loading = null
                    this.state.modal.active = false
                    this.state.currentData = res.data.data.data;
                    this.state.page = res.data.data.current_page
                    this.state.next_page_url = res.data.data.next_page_url
                    this.state.prev_page_url = res.data.data.prev_page_url
                    this.state.last_page = res.data.data.last_page
                    useToast().success("The contact response has been deleted!")
                })
                .catch(error => {
                    this.httpError(error)
                });
        },
        httpError(error) {
            this.state.loading = false
            this.state.del_loading = null
            httpError(error);
        }
    }
}
</script>
