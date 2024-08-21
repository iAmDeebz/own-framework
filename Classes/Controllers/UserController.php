<?php

class UserController
{
    public function show($id = null) {
        // Logic to display a list of users or a specific user
        echo "Showing user(s)";
    }

    public function showPost($uid, $pid) {
        // Logic to display a specific post for a user
        echo "Showing post $pid for user $uid";
    }
}