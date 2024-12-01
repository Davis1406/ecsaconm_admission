(function ($) {
    var form = $("#signup-form");

    // Validation setup
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            email: {
                email: true
            }
        },
        onfocusout: function (element) {
            $(element).valid();
        },
    });

    // Initialize steps with custom logic for the "Submit" button visibility
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        stepsOrientation: "vertical",
        titleTemplate: '<div class="title"><span class="step-number">#index#</span><span class="step-text">#title#</span></div>',
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex === 0) {
                form.parent().parent().parent().append('<div class="footer footer-' + currentIndex + '"></div>');
            }
            if (currentIndex === 1) {
                form.parent().parent().parent().find('.footer').removeClass('footer-0').addClass('footer-' + currentIndex + '');
            }
            if (currentIndex === 2) {
                form.parent().parent().parent().find('.footer').removeClass('footer-1').addClass('footer-' + currentIndex + '');
            }
            if (currentIndex === 3) {
                form.parent().parent().parent().find('.footer').removeClass('footer-2').addClass('footer-' + currentIndex + '');
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            if (form.valid()) {
                // Use regular form submission instead of AJAX
                form.submit();
            } else {
                alert("Please complete the form before submitting.");
            }
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // Check conditions and toggle the Submit button
            toggleSubmitButton();
            return true;
        }
    });

    // Function to toggle the visibility of the Submit button
    function toggleSubmitButton() {
        const checkbox = document.getElementById('checkbox1');
        const radioYes = document.getElementById('radio-yes');
        const finishButton = document.querySelector('.actions a[href="#finish"]'); // "Submit" button selector

        if (checkbox && radioYes && finishButton) {
            if (checkbox.checked && radioYes.checked) {
                finishButton.style.display = 'inline-block'; // Show the Submit button
            } else {
                finishButton.style.display = 'none'; // Hide the Submit button
            }
        }
    }

    // Add event listeners for the checkbox and radio button
    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('checkbox1');
        const radioYes = document.getElementById('radio-yes');
        const radioNo = document.getElementById('radio-no');

        if (checkbox && radioYes && radioNo) {
            checkbox.addEventListener('change', toggleSubmitButton);
            radioYes.addEventListener('change', toggleSubmitButton);
            radioNo.addEventListener('change', toggleSubmitButton);
        }
    });

    // Customizing error messages
    jQuery.extend(jQuery.validator.messages, {
        required: "This field is required.",
        remote: "Please fix this field.",
        email: "Please enter a valid email address.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again."
    });

    // Slider functionality
    var marginSlider = document.getElementById('slider-margin');
    if (marginSlider != undefined) {
        noUiSlider.create(marginSlider, {
            start: [1100],
            step: 100,
            connect: [true, false],
            tooltips: [true],
            range: {
                'min': 100,
                'max': 2000
            },
            pips: {
                mode: 'values',
                values: [100, 2000],
                density: 4
            },
            format: wNumb({
                decimals: 0,
                thousand: '',
                prefix: '$ ',
            })
        });

        var marginMin = document.getElementById('value-lower'),
            marginMax = document.getElementById('value-upper');

        marginSlider.noUiSlider.on('update', function (values, handle) {
            if (handle) {
                marginMax.innerHTML = values[handle];
            } else {
                marginMin.innerHTML = values[handle];
            }
        });
    }
})(jQuery);
