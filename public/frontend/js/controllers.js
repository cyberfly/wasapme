app.controller('MainController', ['$scope', '$rootScope','ngClipboard','CampaignService', function($scope,$rootScope, ngClipboard,CampaignService) {

  $scope.data = {};

  $scope.placeholder_phone = '6012345678';
  $scope.placeholder_message = 'PM Harga';
  var formatted_message_placeholder = $scope.placeholder_message.split(' ').join('+');

  $scope.placeholder_link = config.base_url + '/'+$scope.placeholder_phone+'/'+formatted_message_placeholder;

  $scope.final_link = '';

  $scope.createLink = function() {

    var final_link = config.base_url + '/';

    if ($scope.data.phonenum) {
    	final_link = final_link + $scope.data.phonenum;

    	if ($scope.data.message) {

    		var formatted_message = $scope.data.message.split(' ').join('+');

    		final_link = final_link + '/' + formatted_message;
    	}

    }

    $scope.final_link = final_link;
    // $scope.final_link = config.base_url + '/' + $scope.data.phonenum + '/' + $scope.data.message;
  };

  $scope.clickCopy = function(){
    var final_link_element = angular.element(document.querySelector('#final_link'));

    ngClipboard.toClipboard($scope.final_link);

    final_link_element.select();

    final_link_element.tooltip({
      trigger: 'manual',
      placement: 'bottom'
    }).tooltip('show');

    setTimeout(function() {
        final_link_element.tooltip('hide');
      }, 2000);

  };

  // grab campaignData from scope form data

  $scope.campaignData = $scope.data;

  $scope.startTracking = function(){

    $scope.campaignData.final_link = $scope.final_link;

    //called service to post data to server

    CampaignService.createCampaign($scope.campaignData)
     .then(function(response) {

       console.log(response);

       if (response.data.status=='success') {

          // $scope.campaigns.reload();
          $rootScope.$broadcast('updateItems');

       };
     });

  };

}])

app.controller('CampaignController', ['$scope','ngClipboard','CampaignService', function($scope,ngClipboard,CampaignService) {

  CampaignService.getCampaigns()
  .then(function (response){
    $scope.campaigns = response;
  });

  $scope.$on("updateItems",function(){
    // console.log(1);
    CampaignService.getCampaigns()
    .then(function (response){
      $scope.campaigns = response;
    });
  });

}])