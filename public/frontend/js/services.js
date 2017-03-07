app.service('CampaignService', function($http) {

  var campaigns = [];

  return{
    getCampaigns: function(){

      return $http.get(config.base_url + '/campaigns')
        .then(function (response)
        {
          campaigns = response.data;
          return campaigns;
        });
    },
    getCampaign: function(campaignId){

      return campaigns[campaignId];
    },
    createCampaign: function(campaign){

      var data = campaign;

      return $http({
                method: 'POST',
                data:data,
                url: config.base_url + '/campaigns'
                });

    },
    deleteCampaign: function(campaignId){

          return $http({
                    method: 'DELETE',
                    url: config.base_url + '/campaigns/'+campaignId,
                    });

    }
  };

})