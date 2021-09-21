module.exports = importModule =
        {
            getModule: function (moduleName)
            {
                require('../view/' + moduleName + '/' + moduleName + '.js');
                require('../view/' + moduleName + '/' + moduleName + '.scss');
            }
        };

