
	<style>
	button
	{
		padding: 40px;
		margin: 10px;
	}

	.sel
	{
		background: #ddd;
	}
	</style>

	<div ng-controller="Home" ng-init="host='{{ getHostByName(getHostName()) }}';" keybind>

		<button ng-class="{'sel':buttons[value]}" ng-click="button(value)" ng-repeat="value in [85,73,79,80,74,75]"> <% value %> </button>

	</div>