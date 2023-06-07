<template>
        <div class="form-title mt-4 mt-lg-0">
            Оставьте свой номер и мы Вам перезвоним!
        </div>
        <Form
            v-slot="{ meta }"
            @submit="submit()"
            ref="form"
            class="needs-validation"
        >
            <div class="mt-4 mt-lg-40">
                <vInput
                    name="Имя"
                    placeholder="Имя"
                    rules="required|min:2"
                    v-model="form.main_username"
                />
            </div>
            <div class="mt-32">
                <vPhone
                    name="Телефон"
                    rules="required|length:11"
                    v-model="form.main_phone"
                />
            </div>
            <div class="form-check mt-32">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label ms-3" for="flexCheckChecked">
                    соглашаюсь на обработку <a href="/user-agreement">персональных данных</a>
                </label>
            </div>
            <button
                type="submit"
                class="btn btn-secondary form-btn d-block mt-32"
                :disabled="!meta.valid || isLoading"
            >
                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0294 10.7531C16.0294 8.12805 18.1664 6 20.8025 6H24.5V9.68201C24.5 12.3071 22.363 14.4351 19.7269 14.4351H16.9706V22H16.0294V17.6485H13.2731C10.637 17.6485 8.5 15.5205 8.5 12.8954V9.21339H12.1975C13.7669 9.21339 15.1594 9.96769 16.0294 11.1321V10.7531ZM16.9706 12.8352L20.4698 9.35064L21.1353 10.0134L17.6361 13.4979H19.7269C21.8432 13.4979 23.5588 11.7895 23.5588 9.68201V6.93724H20.8025C18.6862 6.93724 16.9706 8.64568 16.9706 10.7531V12.8352ZM16.0294 16.0486V13.9665C16.0294 11.8591 14.3138 10.1506 12.1975 10.1506H9.44118V12.8954C9.44118 15.0029 11.1568 16.7113 13.2731 16.7113H15.3639L11.8647 13.2268L12.5302 12.564L16.0294 16.0486Z" fill="#5F6826"/>
                </svg>
                <b>Перезвонить мне!</b>
                <span class="spinner-border spinner-border-sm ps-2 fw-light" role="status" v-if="isLoading">
                    <span class="visually-hidden">Loading...</span>
                </span>
            </button>
        </Form>
</template>

<script>

const defaultForm = {
    main_phone: '',
    main_username: '',
    message_group: 'main'
};

export default {
    name: 'MainForm',
    data() {
        return {
            isLoading: false,
            form: Object.assign({}, defaultForm),
            modal: null,
        }
    },
    methods: {
        submit() {
            if (!this.isLoading) {
                this.isLoading = true;
                fetch('/send_message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(this.form)
                })
                    .then(r => r.json())
                    .then(r => {
                        if (r.status) {
                            this.reset();
                            this.$emit('onSend');
                        }

                        if (r.message) {
                            this.$notify({
                                type: r.status ? 'success' : 'danger',
                                text: r.message,
                                duration: 5000
                            });
                        }
                    })
                    .catch(err => console.log(err))
                    .finally(() => this.isLoading = false);
            }
        },
        reset() {
            this.form = Object.assign({}, defaultForm);
            this.$refs.form.resetForm();
        }
    }
}
</script>
