<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Gantt: Resource View</title>
		<!-- Webix Library -->
		<script type="text/javascript" src="webix/webix.js"></script>
		<link
			rel="stylesheet"
			type="text/css"
			href="webix/webix.css"
		/>

		<!-- App -->
		<script type="text/javascript" src="gantt.js"></script>
		<link rel="stylesheet" type="text/css" href="gantt.css" />
	</head>
	<body>
		<script>
			webix.ready(function() {
				if (webix.env.mobile) webix.ui.fullScreen();
				webix.CustomScroll.init();

				webix.ui({
					rows: [
						{
							view: "toolbar",
							//css: "webix_dark",
							padding: {
								top: 5,
								bottom: 5,
								left: 5,
							},
							elements: [
								{},
								{
									view: "segmented",
									label: "",
									width: 350,
									value: "resources",
									options: [
										{ value: "Resource view", id: "resources" },
										{ value: "Task view", id: "tasks" },
									],
									on: {
										onChange: v => {
											$$("gantt").getState().display = v;
										},
									},
								},
								{},
							],
						},
						{
							view: "gantt",
							id: "gantt",
							url: "https://docs.webix.com/gantt-backend/",
							// enable resources
							resources: true,
							// show resources view
							display: "resources",
						},
					],
				});
			});
		</script>
	</body>
</html>
