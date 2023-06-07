<template>
    <div class="position-relative">
        <select
            :name="name"
            class="form-select"
            :class="{
            'is-invalid': !!errorMessage,
            'is-valid': meta.valid
        }"
            @change="handleChange"
            @blur="handleBlur"
        >
            <option v-text="placeholder"></option>
            <option
                v-for="option in newServices"
                :value="option.value"
                v-text="option.label"
                :selected="option.value === modelValue"
            ></option>
        </select>

        <Transition name="fade" mode="out-in">
            <ErrorMessage :name="name" class="invalid-tooltip"/>
        </Transition>
    </div>
</template>

<script>
import { toRef } from 'vue';
import { useField } from 'vee-validate';

export default {
    name: 'vSelect',
    props: {
        name: {
            type: String,
            required: true
        },
        id: {
            type: String,
            default: ''
        },
        rules: {
            type: String,
            required: true
        },
        modelValue: '',
        placeholder: '',
        newServices: {
            type: Array,
            default: []
        }
    },
    setup(props) {
        const name = toRef(props, 'name');

        const {
            value: inputValue,
            errorMessage,
            handleBlur,
            handleChange,
            meta,
        } = useField(name, props.rules, {
            initialValue: props.modelValue
        });

        return {
            inputValue,
            errorMessage,
            handleBlur,
            handleChange,
            meta
        };
    },
}
</script>