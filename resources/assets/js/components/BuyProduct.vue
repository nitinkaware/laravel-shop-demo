<template>
    <button class="tw-mt-2 tw-bg-transparent hover:tw-bg-blue tw-text-blue-dark tw-font-semibold hover:tw-text-white tw-py-2 tw-px-4 tw-border tw-border-blue hover:tw-border-transparent tw-rounded-full"
            @click="buy">
        Buy
    </button>
</template>

<script>

    export default {
        props: ['propProductId'],
        data: function () {
            return {
                productId: {},
            }
        },
        methods: {
            buy: function () {
                console.log("I am called");
            }
        },
        created() {

        },
        computed: {}
    }
</script>