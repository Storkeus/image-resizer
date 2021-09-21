document.addEventListener('DOMContentLoaded', () => {

    const changeDisabledValueInIputs = (inputs, value) => {
        for (const input of inputs) {
            input.disabled = value;
        }
    }

    const forms = document.querySelectorAll('.form');
    if (!forms) {
        return;
    }

    for (const form of forms) {


        const methodInputs = form.querySelectorAll('.form__input--radio');

        if (!methodInputs) {
            continue;
        }

        for (const methodInput of methodInputs) {
            methodInput.addEventListener('change', () => {
                const {
                    showGroup
                } = methodInput.dataset;

                const groups = form.querySelectorAll('.form__input-group[data-show-group]');
                console.log(groups);

                if (!groups) {
                    return;
                }

                for (const group of groups) {
                    const { showGroup: groupName } = group.dataset;
                    const inputs = group.querySelectorAll('.form__input');
                    if (groupName === showGroup) {
                        changeDisabledValueInIputs(inputs, false);
                        group.classList.remove('form__input-group--hidden');
                    } else {
                        changeDisabledValueInIputs(inputs, true);
                        group.classList.add('form__input-group--hidden');
                    }
                }

            });


        }

    }

});