<template>
    <label class="selectgroup-item">
        <input type="checkbox" name="value" class="selectgroup-input" v-model="checked" @change="emitEvent">
        <span class="selectgroup-button"> {{ category.name }}</span>
    </label>
</template>

<script>
    export default {
        props: ['category'],
        data: function () {
            return {
                checked: false
            }
        },
        methods: {
            emitEvent() {
                this.$root.$emit('productFiltered', {
                    id: this.category.id,
                    checked: this.checked
                });
            }
        }
    }
</script>
