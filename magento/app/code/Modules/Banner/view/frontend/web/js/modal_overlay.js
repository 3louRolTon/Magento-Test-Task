require([
    "jquery",
    "Magento_Ui/js/modal/modal"
],function($, modal) {
    var popup;
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    var dateTime = date+' '+time;

    $.ajax({
        url:  'http://magento2.local/rest/all/V1/banner/banners?searchCriteria[filterGroups][0][filters][0][field]=banner_start_day&searchCriteria[filterGroups][0][filters][0][value]='+dateTime+'&searchCriteria[filterGroups][0][filters][0][conditionType]=lteq&searchCriteria[filterGroups][0][filters][1][field]=banner_end_day&searchCriteria[filterGroups][0][filters][1][value]='+dateTime+'&searchCriteria[filterGroups][0][filters][1][conditionType]=gteq',
        type: 'get',
        data: {},
        success: function(response){

            var banners_id = JSON.parse($.cookie("banners_id"));
            if(banners_id == null) banners_id = [];
            var banner = getBanner(response.items.length, response.items, banners_id);

            if(banner.one_show && banners_id.indexOf(banner.id) == -1) {

                banners_id.push(banner.id);
                $.cookie("banners_id", JSON.stringify(banners_id));
            }

            $("#modal-title").html(banner.title);
            $("#modal-content").html(banner.text);
            $("#modal-popup-content").html(banner.popel);

            var options = {
                type: 'popup',
                responsive: true,
                title: banner.title
            };

            popup = modal(options, $('#modal-popup'));
            $("#modal").click(function() {
                $('#modal-popup').modal('openModal');
            });
        },
        error: function(){

        }
    });

    function getBanner(n, banners, banners_id){
        if(n == 0){
            var currentBanner = banners[0];
            if(banners_id.indexOf(currentBanner.id) != -1){
                return []
            }
            return currentBanner;
        }
        if(n > 0){
            var currentId = Math.floor((Math.random() * n) + 1) - 1;
            var currentBanner = banners[currentId];

            if(banners_id.indexOf(currentBanner.id) != -1){
                banners.splice(currentId, 1);
                currentBanner = getBanner(n-1, banners, banners_id);
            }
            return currentBanner;
        }

        return [];
    }
});
