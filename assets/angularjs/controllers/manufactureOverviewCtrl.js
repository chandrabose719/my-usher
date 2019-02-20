
usherApp.controller('manufactureOverview', function($scope, $http){

	// Methods
	$scope.manufactureData = function(){
		$http({
		    method: 'get', 
		    url: baseUrl+'manufacture/manufacture_data'
		}).then(function (response) {
		    $scope.file_data = response.data.file_data;
		    $scope.order_data = response.data.order_data;
			$scope.totalCount = $scope.totalFileCount($scope.file_data);			
			$scope.totalAmount = $scope.totalFileAmount($scope.file_data);
		},function (error){
		    console.log(error);
		});
	}

	$scope.manufactureName = function(material_id, layer_height_id, color_id, post_process_id){
		if (material_id != undefined && material_id != '') {
			$http({
			    method: 'post',
			    data: { 'id': material_id },
			    url: baseUrl+'manufacture/material_name'
			}).then(function (response) {
			    $scope.matrial_data = response.data;
			},function (error){
			    console.log(error);
			});
		}

		if (layer_height_id != undefined && layer_height_id != '') {
			$http({
			    method: 'post',
			    data: { 'id': layer_height_id },
			    url: baseUrl+'manufacture/layer_height_name'
			}).then(function (response) {
			    $scope.layer_height_data = response.data;
			},function (error){
			    console.log(error);
			});
		}
  		
  		if (color_id != undefined && color_id != '') {
			$http({
			    method: 'post',
			    data: { 'id': color_id },
			    url: baseUrl+'manufacture/color_name'
			}).then(function (response) {
			    $scope.color_data = response.data;
			},function (error){
			    console.log(error);
			});
		}

		if (post_process_id != undefined && post_process_id != '') {
			$http({
			    method: 'post',
			    data: { 'id': post_process_id },
			    url: baseUrl+'manufacture/post_process_name'
			}).then(function (response) {
			    $scope.post_process_data = response.data;
			},function (error){
			    console.log(error);
			});
		}
  	}

	$scope.totalFileCount = function(file_data){
	    var count = 0;
	    var keys = Object.keys(file_data);
		count = keys.length;
	    return count;
	}

	$scope.totalFileAmount = function(file_data){
	    var total = 0;
	    angular.forEach(file_data, function(file){
	    	total += file.file_amount  *  file.file_qty;
	    })
	    return total;
	}

	$scope.payableAmount = function(){
		var totalPayment = 0;
		angular.forEach($scope.file_data, function(file){
	    	totalPayment += file.file_amount  *  file.file_qty;
	    })
	    totalPayment += $scope.order_data.delivery_amount;
	    $scope.amount = totalPayment;
	    return totalPayment;
	}

	// Stripe Checkout Payment
	$scope.stripeCheckoutPayment = function(){
		var amount = $scope.amount*100;
		var handler = StripeCheckout.configure({
			key: 'pk_test_5fA7g0sKfGEuDal5pEdys0Te',
		  	image: 'https://3dusher.com/assets/images/favicon.png',
		  	locale: 'auto',
		  	token: function(token) {
				tokenID = token.id;
				$http({
				    method: 'post',
				    data: { 'amount': amount, 'tokenID':tokenID },
				    url: baseUrl+'manufacture/payment/'+amount+'/'+tokenID
				}).then(function (response) {
				    console.log(response);
				    console.log(response.data);
				},function (error){
				    console.log(error);
				});	    	
		  	}
		});
		// Open Checkout with further options:
		handler.open({
		    name: $scope.user_data.user_name,
		    description: '',
		    amount: amount
		});
	}
	// Close Checkout on page navigation:
	window.addEventListener('popstate', function() {
	  handler.close();
	});
	// End Stripe Checkout Payment

	

	$scope.qtyDecreament = function(file_id){
		$http({
		    method: 'post',
		    data: { 'type': 'decreament', 'file_id': file_id },
		    url: baseUrl+'manufacture/file_qty'
		}).then(function (response) {
		    if(response.data == 'success'){
		    	$scope.manufactureOverviewFunc();
		    }
		},function (error){
		    console.log(error);
		});
	}

	$scope.qtyIncreament = function(file_id){
		$http({
		    method: 'post',
		    data: { 'type': 'increament', 'file_id': file_id },
		    url: baseUrl+'manufacture/file_qty'
		}).then(function (response) {
		   	if(response.data == 'success'){
		    	$scope.manufactureOverviewFunc();
		    }
		},function (error){
		    console.log(error);
		});
	}

	$scope.shippingMethod = function(type){
		if (type == 'Express') {
			delivery_amount = 30;
		}else{
			delivery_amount = 10;
		}
		$http({
		    method: 'post',
		    data: { 'delivery_amount': delivery_amount, 'delivery_type':type },
		    url: baseUrl+'manufacture/delivery'
		}).then(function (response) {
		    if(response.data == 'success'){
		    	$scope.manufactureOverviewFunc();
		    }
		},function (error){
		    console.log(error);
		});
	}

});
