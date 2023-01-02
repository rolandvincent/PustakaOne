<?php
define('SECOND_OF_DAY', 86400);

function Membership($id)
{
    $membership = [
        0 => "Tidak ada",
        1 => "ONE",
        2 => "ONE PLUS",
        3 => "ONE ULTRA"
    ];
    return $membership[$id];
}

function MembershipCSS($id)
{
    $membership = [
        0 => "bg-membership-none",
        1 => "bg-membership-one",
        2 => "bg-membership-one-plus",
        3 => "bg-membership-one-ultra"
    ];
    return $membership[$id];
}

function membershipUsageLimit($id)
{
    $membership = [
        0 => 0,
        1 => 4,
        2 => 10,
        3 => 25
    ];
    return $membership[$id];
}

function avatar($user)
{
    if ($user['avatar'] == null)
        return '/img/avatars/default.png';
    return '/img/avatars/' . $user['avatar'];
}

function hak_akses($role)
{
    $akses = [
        0 => "Administrator",
        1 => "Pustakawan",
        2 => "Member"
    ];
    return $akses[$role];
}

function sender($id)
{
    $sender_url = [
        0 => "/admin/add_user",
        1 => "/admin/edit_user",
        2 => "/admin/edit_buku",
        3 => "/admin/edit_profil",
    ];
    return $sender_url[$id];
}
