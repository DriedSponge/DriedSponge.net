<?php
// include() this file everywhere you want to have these functions 
// (you need to have included the mysql stuff first before you include/use this)

// Returns true if the user is YOUR_STEAMID or is found in database
function isAdmin($steamid) {
    $isAdminQuery = SQLWrapper()->prepare("SELECT id64 FROM staff WHERE id64 = ?"); // because its a single var we can use ?
    $isAdminQuery->execute([$steamid]);
    $Admin = $isAdminQuery->fetch();

    return ($steamid == "YOUR_STEAMID" || !empty($Admin));
}