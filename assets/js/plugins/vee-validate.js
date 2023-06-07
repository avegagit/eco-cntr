import { Form, Field, ErrorMessage, defineRule, configure } from 'vee-validate';
import { required, email, length, max, min } from '@vee-validate/rules';
import { setLocale, localize } from '@vee-validate/i18n';
import ru from '@vee-validate/i18n/dist/locale/ru.json';

import vInput from '../components/forms/vInput.vue';
import vSelect from '../components/forms/vSelect.vue';
import vPhone from '../components/forms/vPhone.vue';

export default {
    install(app) {
        app.component('Form', Form);
        app.component('Field', Field);
        app.component('ErrorMessage', ErrorMessage);

        app.component('vInput', vInput);
        app.component('vSelect', vSelect);
        app.component('vPhone', vPhone);

        defineRule('required', required);
        defineRule('email', email);
        defineRule('length', length);
        defineRule('max', max);
        defineRule('min', min);
        defineRule("phone", (value) => {
            return value.match(/\+7 \(9\d{2}\) \d{3}-\d{2}-\d{2}/)?.length || 0 > 0;
        });

        configure({
            generateMessage: localize({
                ru
            }),
            validateOnInput: true
        });

        setLocale('ru');
    }
}