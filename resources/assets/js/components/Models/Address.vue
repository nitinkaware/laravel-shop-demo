<template>
    <div>
        <modal name="address"
               :clickToClose="false"
               :scrollable="true"
               :width="450"
               height="auto"
               :pivotX="0.5"
               :pivotY="0.3"
               @before-open="beforeOpen">
            <div class="cart">
                <div class="card-header">
                    <h3 class="card-title">Add new address</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Pin Code</label>
                                <div class="input-icon mb-3">
                                    <input type="text"
                                           class="form-control"
                                           :class="form.errors.has('pin_code') ? 'is-invalid' : ''"
                                           v-model="pin_code"
                                           @blur="fetchAddressDetails"
                                           tabindex="1">
                                    <div class="invalid-feedback">{{ form.errors.get('pin_code') }}</div>
                                    <span class="input-icon-addon" v-if="this.fetching.isPending">
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Locality / Town</label>
                                <div class="input-icon mb-3">
                                    <input type="text"
                                           class="form-control"
                                           :class="form.errors.has('locality') ? 'is-invalid' : ''"
                                           tabindex="2"
                                           v-model="locality">
                                    <div class="invalid-feedback">{{ form.errors.get('locality') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <div class="input-icon mb-3">
                                    <input type="text"
                                           class="form-control"
                                           readonly
                                           v-model="city"
                                           tabindex="3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <div class="input-icon mb-3">
                                    <input type="text"
                                           class="form-control"
                                           readonly
                                           v-model="state"
                                           tabindex="4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <div class="input-icon mb-3">
                                    <input type="text"
                                           class="form-control"
                                           :class="form.errors.has('name') ? 'is-invalid' : ''"
                                           tabindex="5"
                                           v-model="name">
                                    <div class="invalid-feedback">{{ form.errors.get('name') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <div class="input-icon mb-3">
                                    <textarea class="form-control"
                                              :class="form.errors.has('address') ? 'is-invalid' : ''"
                                              rows="3"
                                              tabindex="7"
                                              v-model="address">
                                    </textarea>
                                    <div class="invalid-feedback">{{ form.errors.get('address') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Mobile No.</label>
                                <div class="input-icon mb-3">
                                    <input type="text"
                                           class="form-control"
                                           :class="form.errors.has('mobile') ? 'is-invalid' : ''"
                                           tabindex="7"
                                           v-model="mobile">
                                    <div class="invalid-feedback">{{ form.errors.get('mobile') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           value="1"
                                           tabindex="8"
                                           v-model="is_default">
                                    <span class="custom-control-label">Make this my default address</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-lg btn-outline-secondary btn-primary ml-9 mr-3"
                                    tabindex="9"
                                    @click="reset">
                                CANCEL
                            </button>
                            <button type="submit"
                                    class="btn btn-lg btn-primary"
                                    :class="form.isPending ? 'btn-loading' : '' "
                                    :disabled="form.isPending"
                                    tabindex="10"
                                    @click="handleSubmit">
                                <i class="fe fe-save"></i>
                                SAVE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>

    import Form from '../../app/FormObject/Form';

    export default {
        data: function () {
            return {
                isSaving: false,
                pin_code: null,
                locality: null,
                city: null,
                state: null,
                name: null,
                address: null,
                mobile: null,
                is_default: false,
                fetching: new Form,
                form: new Form,
                cachedPins: collect()
            }
        },
        computed: {},
        methods: {
            beforeOpen(event) {
                if (event.params) {
                    this.pin_code = event.params.pin_code;
                    this.locality = event.params.locality;
                    this.city = event.params.city;
                    this.state = event.params.state;
                    this.name = event.params.name;
                    this.address = event.params.address;
                    this.mobile = event.params.mobile;
                    this.is_default = event.params.is_default;
                }
            },
            fetchAddressDetails() {
                if (this.cachedPins.contains(this.pin_code)) {
                    return;
                }

                this.fetching.get(route('api.pincode.index', this.pin_code)).then(response => {
                    if (response.state !== '') {
                        this.cachedPins.push(this.pin_code);
                        this.city = response.city;
                        this.state = response.stateName;
                    }
                });
            },
            reset() {
                this.form.errors.clear();
                this.$modal.hide('address');

                this.city = null;
                this.state = null;
                this.pin_code = null;
                this.locality = null;
                this.name = null;
                this.address = null;
                this.mobile = null;
                this.is_default = false;
            },
            handleSubmit() {
                this.form.post(route('api.my.address.store'), {
                    pin_code: this.pin_code,
                    locality: this.locality,
                    name: this.name,
                    address: this.address,
                    mobile: this.mobile,
                    is_default: this.is_default,
                }).then(response => {
                    this.$root.$emit('newAddressAdded', response.data);
                    this.reset();
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>