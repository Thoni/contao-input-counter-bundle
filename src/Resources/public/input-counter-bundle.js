window.InputCounterBundle = {
    init: function()
    {
        this.initCounter();
    },
    initCounter: function()
    {
        // get config from body tag
        var config = document.querySelector('body').getAttribute('data-input-count');

        if (!config)
        {
            return;
        }

        config = JSON.parse(config);

        if (!Array.isArray(config))
        {
            return;
        }

        function updateCounter(element, configData) {
            var label = document.querySelector('[for="ctrl_' + configData.name + '"]');

            if (!label.getAttribute('data-text'))
            {
                label.setAttribute('data-text', label.innerHTML);
            }

            label.innerHTML = label.getAttribute('data-text') + ' (<span>' + element.value.length + '/' + configData.max + '</span>)';
        }

        config.forEach(function(configData) {
            var element = document.querySelector('#ctrl_' + configData.name);

            if (element)
            {
                element.addEventListener('input', function() {
                    updateCounter(element, configData);
                }, false);

                updateCounter(element, configData);
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', function() {
    InputCounterBundle.init();
});