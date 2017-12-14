/**
 * Created by anuragshukla on 10/02/17.
 */
    function dataFactoryCall(urlasdata, methodasdata, paramasdata, callback) {
        Pace.restart();
        Pace.track(function () {
            $.ajax
            ({
                type: "POST",
                url: "includes/wrapper/",
                dataType: 'json',
                async: true,
                data: {
                    "url": urlasdata,
                    "method": methodasdata,
                    "params": paramasdata
                },
                success: function (data) {
                    callback(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    };
