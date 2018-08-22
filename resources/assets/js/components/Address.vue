<template>
    <label class="col-lg-4 pointer">
        <input type="radio"
               name="selected_address"
               class="address-input"
               :checked="address.is_default"
        >
        <div class="card rounded-full badge-pill address-selected address-row">
            <div class="card-body d-flex flex-column">
                <h4>{{ address.name }} {{ address.is_default ? '(Default)' : '' }} </h4>
                <div class="text-muted">
                    {{ address.address }}.
                </div>
                <div class="text-muted">
                    {{ cityName }}
                </div>
                <div class="text-muted mb-3">
                    {{ address.state }}
                </div>
                <p>
                    <span class="text-muted">Mobile:</span> <strong> {{ address.mobile }}</strong>
                </p>
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <button type="button" class="btn btn-pill btn-secondary mr-5" @click="deleteAddress">
                        <i class="fa fa-remove" data-toggle="tooltip"
                           data-original-title="Remove"></i>
                        Remove
                    </button>
                    <button type="button" class="btn btn-pill btn-secondary" @click="showModal">
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
    import Form from '../app/FormObject/Form';
    export default {
        props: ['propAddress'],
        data: function () {
            return {
                address: this.propAddress,
                checkedId: null,
                form: new Form
            }
        },
        created() {
            this.$root.$on('markedAsDefaultAddress', id => {
                this.address.is_default = this.address.id === id;
            });

            this.$root.$on('addressUpdated', address => {
                if (this.address.id === address.id) {
                    this.address = address;
                }
            });
        },
        computed: {
            cityName: function () {
                return `${this.address.pin_code} - ${this.address.distinct}`;
            }
        },
        methods: {
            showModal: function () {
                this.$modal.show('address', {
                    id: this.address.id,
                    pin_code: this.address.pin_code,
                    locality: this.address.town,
                    city: this.address.distinct,
                    state: this.address.state,
                    name: this.address.name,
                    address: this.address.address,
                    mobile: this.address.mobile,
                    is_default: this.address.is_default,
                });
            },
            deleteAddress: function () {
                let shouldDelete = swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove this address!'
                });

                shouldDelete.then((result) => {
                    if (result.value) {
                        this.form.delete(route('api.my.address.destroy', this.address.id)).then(response => {
                            this.$root.$emit('addressDeleted', response.data);
                        });
                    }
                });
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