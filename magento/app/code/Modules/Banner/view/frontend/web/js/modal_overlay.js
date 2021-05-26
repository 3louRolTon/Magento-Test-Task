require([
    "jquery",
    "Magento_Ui/js/modal/modal"
],function($, modal) {

    $.ajax({
        url:  '/getbanner/banner/index',
        type: 'get',
        success: function(response){

            var banners_id = JSON.parse($.cookie("banners_id"));
            if(banners_id == null) banners_id = [];

            var banner = getBanner(response.length, response, banners_id);

            if(Boolean(Number(banner.banner_one_show)) && banners_id.indexOf(banner.banner_id) == -1) {
                banners_id.push(banner.banner_id);
                $.cookie("banners_id", JSON.stringify(banners_id));
            }

            $("#modal-title").html(banner.banner_name);
            $("#modal-content").html(banner.banner_text);
            $("#modal-popup-content").html(banner.banner_popel);

            var options = {
                type: 'popup',
                responsive: true,
                title: banner.banner_name
            };

            popup = modal(options, $('#modal-popup'));
            $("#modal").click(function() {
                $('#modal-popup').modal('openModal');
            });
        }
    });

    function getBanner(n, banners, banners_id){
        if(n > 0){
            var currentId = Math.floor((Math.random() * n) + 1) - 1;
            var currentBanner = banners[currentId];

            if(banners_id.indexOf(currentBanner.banner_id) != -1){
                banners.splice(currentId, 1);
                currentBanner = getBanner(n-1, banners, banners_id);
            }
            return currentBanner;
        }

        return [];
    }
});
