<template>
    <div class="has-text-centered container" data-aos="fade-in">
        <h1 class="title page-title mb-1" :class="customClass">
            <slot></slot>
            {{ header }}
        </h1>
        <h2 class="subtitle page-subtitle mt-2" v-if="sub_header">{{ sub_header }}</h2>
    </div>
</template>

<script>
export default {
    name: "Pagehead",
    props: {
        header: {
            type: String,
            required: false,
            default: null,
        },
        sub_header: {
            type: String,
            required: false,
            default: null,
        },
        customClass:{
            type: String,
            required: false,
        }
    }
}
</script>
