<template>
    <nav class="navbar" role="navigation" aria-label="main navigation" style="background-color: rgba(217,245,228,0.95)">
        <div class="navbar-brand">
            <a class="navbar-item" ><b>HOBBIES APP</b></a>
            <div class="navbar-menu is-active">
                <router-link to="/home" class="navbar-item"><b>Home</b></router-link>
                <router-link to="/about" class="navbar-item"><b>About</b></router-link>
            </div>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    </nav>
</template>

