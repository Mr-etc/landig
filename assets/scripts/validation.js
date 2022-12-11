class Validation {
    _error = false;
    _fields = [];
    _regexs = {
        baseField: /^[А-яA-z ,.'-]+$/,
        phone: /^(?:\d){10}\d$/,
        email: /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/,
        select: /^[^0 ]+$/
    };

    appendField(fieldObj, event = 'click', callback = null) {
        if (!this._regexs.hasOwnProperty(fieldObj.getAttribute('check')) && !callback)
            return false;
        fieldObj.callback = callback;
        fieldObj.event = event;
        this._fields.push(fieldObj);
        return true;
    }

    start() {
        this._fields.forEach(e => {
            e.addEventListener(e.event, e.validatorCollback = event => this._checkField(event.currentTarget) );
        });
    }

    stop(){
        this._fields.forEach(e => e.removeEventListener(e.event, e.validatorCollback));
    }

    isValid(validator, value) {
        return this._regexs[validator].test(value);
    }

    _checkField(element) {
        if(element.callback)
            return this._setErrorField(element, element.callback());
        else if (validator.isValid(element.getAttribute('check'), element.value))
            return this._setErrorField(element, false);
        else 
            return this._setErrorField(element, true);
    }

    _checkFields(elements){
        let hasError = false;
        elements.forEach(e => {
            if(this._checkField(e))
                hasError = true;
        });
        return hasError;
    }

    _setErrorField(element, hasError){
        hasError? element.classList.add('error') : element.classList.remove('error');
        return hasError;
    }

    hasError() {
        return this._checkFields(this._fields);
    }
}