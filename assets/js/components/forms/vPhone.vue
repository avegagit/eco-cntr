<template>
    <div class="position-relative">
        <input
            :id="id || null"
            type="tel"
            inputmode="tel"
            class="form-control"
            :class="{
            'is-invalid': !!errorMessage,
            'is-valid': meta.valid
        }"
            placeholder="+7 (___) ___-__-__"
            :value="modelValue"
            v-maska="'+7 (###) ###-##-##'"
            @maska="handleChange"
        />
        <Transition name="fade" mode="out-in">
            <ErrorMessage :name="name" class="invalid-tooltip"/>
        </Transition>
    </div>
</template>

<script>
import { ref, toRef } from 'vue';
import { useField } from 'vee-validate';

export default {
    name: 'vPhone',
    props: {
        name: {
            type: String,
            required: true
        },
        modelValue: {
            type: String
        },
        placeholder: {
            type: String,
            default: ''
        },
        id: {
            type: String,
            default: ''
        },
        rules: {
            type: String,
            required: true
        }
    },
    setup(props, ctx) {
        const name = toRef(props, 'name');

        const {
            value,
            errorMessage,
            meta,
        } = useField(name, props.rules, {
            initialValue: props.modelValue,
            syncVModel: false
        });

        const handleChange = (e) => {
            let v = e.target.dataset.maskRawValue;
            value.value = v ? '7' + v : ''
            ctx.emit('update:modelValue', e.target.value);
        }

        return {
            value,
            errorMessage,
            handleChange,
            meta
        };
    }
}
</script>