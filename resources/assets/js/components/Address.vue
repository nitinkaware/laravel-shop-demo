<template>
    <label class="col-lg-4 pointer">
        <input type="radio"
               name="selected_address"
               class="address-input"
               :checked="address.is_default"
               @click="emitAddressSelected"
        >
        <div class="card rounded-full badge-pill address-selected address-row">
            <div class="card-body d-flex flex-column">
                <h4>{{ address.name }} {{ address.is_default ? '(Default)' : '' }} </h4>
                <div class="text-muted">
                    {{ address.address }}.
                </div>
                <div class="text-muted mb-3">
                    {{ cityName }}
                </div>
                <p>
                    <span class="text-muted">Mobile:</span> <strong> {{ address.mobile }}</strong>
                </p>
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <button type="button" class="btn btn-pill btn-secondary mr-5">
                        <i class="fa fa-remove" data-toggle="tooltip"
                           data-original-title="Remove"></i>
                        Remove
                    </button>
                    <button type="button" class="btn btn-pill btn-secondary">
                        <i class="fa fa-edit" data-toggle="tooltip"
                           data-original-title="fa fa-edit"></i>
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </label>
</template>

<script>
    export default {
        props: ['propAddress'],
        data: function () {
            return {
                address: this.propAddress,
                checkedId: null,
            }
        },
        created(){

        },
        computed: {
            cityName: function () {
                return `${this.address.pin_code} - ${this.address.distinct}`;
            }
        },
        methods: {
            emitAddressSelected: function () {
                console.log("clickedAddressId: " + this.address.id);
            }
        }
    }
</script>

<style>
    .pointer {
        cursor: pointer;
    }

    .address-input {
        display: none;
    }

    .address-input:checked + .address-selected {
        border: 1px solid #467fcf;
        z-index: 1;
        color: #467fcf;
        background: #edf2fa;
    }
</style>