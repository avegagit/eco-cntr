<template>
    <div class="position-relative">
        <input
            class="form-control"
            :class="{
                'is-invalid': !!errorMessage,
                'is-valid': meta.valid
            }"
            :type="type"
            :inputmode="inputmode"
            :value="modelValue"
            :name="name"
            :placeholder="placeholder"
            @input="handleChange"
            @blur="handleBlur"
            ref="inputRef"
        >
        <Transition name="fade" mode="out-in">
            <ErrorMessage :name="name" class="invalid-tooltip"/>
        </Transition>
    </div>
</template>

<!--<script>-->
<!--import { toRef } from 'vue';-->
<!--import { useField } from 'vee-validate';-->

<!--export default {-->
<!--    name: 'vInput',-->
<!--    props: {-->
<!--        type: {-->
<!--            type: String,-->
<!--            default: 'text'-->
<!--        },-->
<!--        inputmode: {-->
<!--            type: String,-->
<!--            default: 'text'-->
<!--        },-->
<!--        name: {-->
<!--            type: String,-->
<!--            required: true-->
<!--        },-->
<!--        placeholder: {-->
<!--            type: String,-->
<!--            default: ''-->
<!--        },-->
<!--        rules: {-->
<!--            type: String,-->
<!--            required: true-->
<!--        },-->
<!--        modelValue: {-->
<!--            type: String-->
<!--        }-->
<!--    },-->
<!--    setup(props) {-->
<!--        const name = toRef(props, 'name');-->

<!--        const {-->
<!--            value: inputValue,-->
<!--            errorMessage,-->
<!--            handleBlur,-->
<!--            handleChange,-->
<!--            meta,-->
<!--        } = useField(name, props.rules, {-->
<!--            initialValue: props.modelValue-->
<!--        });-->

<!--        return {-->
<!--            inputValue,-->
<!--            errorMessage,-->
<!--            handleBlur,-->
<!--            handleChange,-->
<!--            meta-->
<!--        };-->
<!--    }-->
<!--}-->
<!--</script>-->
<script setup>
import { onMounted, ref} from "vue";
import { useField } from "vee-validate";

const { id, name, rules, modelValue, autofocus } = defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    inputmode: String,
    id: String,
    placeholder: String,
    label: String,
    rules: String,
    modelValue: String,
    autofocus: Boolean,
});

const inputRef = ref(null);

const {
    value: inputValue,
    errorMessage,
    handleBlur,
    handleChange,
    meta,
} = useField(name, rules, {
    initialValue: modelValue,
});

onMounted(() => {
    if (autofocus) {
        inputRef.value.focus();
    }
});
</script>