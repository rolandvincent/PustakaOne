<?php

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
        0 => "text-bg-dark",
        1 => "bg-membership-one",
        2 => "bg-membership-one-plus",
        3 => "bg-membership-one-ultra"
    ];
    return $membership[$id];
}

function avatar($user)
{
    if ($user['avatar'] == null)
        return '/img/avatars/default.png';
    return '/img/avatars/' . $user['avatar'];
}
