<template>
    <div v-if="isLoggedIn">
        <div class="dropdown">
            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                <span class="avatar"></span>
                <span class="ml-2 d-none d-lg-block">
                <span class="text-default">{{ user.name }}</span>
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="/profile">
                    <i class="dropdown-icon fe fe-user"></i> Profile
                </a>
                <a class="dropdown-item" href="/settings">
                    <i class="dropdown-icon fe fe-settings"></i> Settings
                </a>
                <a class="dropdown-item" :href="route('wishlist.index')">
                    <i class="dropdown-icon fe fe-heart"></i> Wishlist
                </a>
                <a class="dropdown-item" href="javascript:void(0)" @click="logout">
                    <i class="dropdown-icon fe fe-log-out"></i> Logout
                </a>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['propUser', 'propIsLoggedIn'],
        data: function () {
            return {
                user: this.propUser,
                isLoggedIn: this.propIsLoggedIn,
            }
        },
        created() {
            this.$root.$on('userLoggedIn', (data) => {
                this.isLoggedIn = data.isLoggedIn;
                this.user = data.user;
            });
        },
        methods: {
            route: route,
            logout: function () {
                axios.post(route('logout')).then(() => {
                    window.location.reload();
                }).catch((error) => {
                    console.log(error);
                });
            }
        },
        computed: {}
    }
</script>