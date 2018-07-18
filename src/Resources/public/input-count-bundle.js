window.InputCountBundle = {
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

        function updateCounter(element, name) {
            var label = document.querySelector('[for="ctrl_' + name + '"]');

            if (!label.getAttribute('data-text'))
            {
                label.setAttribute('data-text', label.innerHTML);
            }

            label.innerHTML = label.getAttribute('data-text') + ' (<span>' + element.value.length + '</span>)';
        }

        config.forEach(function(configData) {
            var element = document.querySelector('#ctrl_' + configData.name);

            if (element)
            {
                element.addEventListener('input', function() {
                    updateCounter(element, configData.name);
                }, false);

                updateCounter(element, configData.name);
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', function() {
    InputCountBundle.init();
});