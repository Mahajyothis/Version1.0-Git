  $(document).ready(function () {
  var gradient1 = {
                type: 'linearGradient',
                x0: 0,
                y0: 0.5,
                x1: 1,
                y1: 0.5,
                colorStops: [{ offset: 0, color: '#FF0000' },
                             { offset: 1, color: '#FA8258' }]
            };

            var gradient2 = {
                type: 'linearGradient',
                x0: 0.5,
                y0: 0,
                x1: 0.5,
                y1: 1,
                colorStops: [{ offset: 0, color: '#80FF00' },
                             { offset: 1, color: '#01DF01' }]
            };
			var gradient3 = {
                type: 'linearGradient',
                x0: 0.5,
                y0: 2,
                x1: 1,
                y1: 0.5,
                colorStops: [{ offset: 0, color: '#FFFF00' },
                             { offset: 1, color: '#9AFE2E' }]
            };


            var anchorGradient = {
                type: 'radialGradient',
                x0: 0.35,
                y0: 0.35,
                r0: 0.0,
                x1: 0.35,
                y1: 0.35,
                r1: 1,
                colorStops: [{ offset: 0, color: '#4F6169' },
                             { offset: 1, color: '#252E32' }]
            };

            $('#jqRadialGauge').jqRadialGauge({
                background: '#F7F7F7',
                border: {
                    lineWidth: 6,
                    strokeStyle: '#76786A',
                    padding: 16
                },
                shadows: {
                    enabled: true
                },
                anchor: {
                    visible: true,
                    fillStyle: anchorGradient,
                    radius: 0.10
                },
                tooltips: {
                    disabled: false,
                    highlighting: true
                },
                animation: {
                    duration: 1
                },
                annotations: [
                                {
                                    text: 'Friendship Meter',
                                    font: '18px sans-serif',
                                    horizontalOffset: 0.5,
                                    verticalOffset: 0.80
                                }
                ],
                scales: [
                         {
                             minimum: 0,
                             maximum: 100,
                             startAngle: 140,
                             endAngle: 400,
                             majorTickMarks: {
                                 length: 12,
                                 lineWidth: 2,
                                 interval: 10,
                                 offset: 0.84
                             },
                             minorTickMarks: {
                                 visible: true,
                                 length: 8,
                                 lineWidth: 2,
                                 interval: 2,
                                 offset: 0.84
                             },
                             labels: {
                                 orientation: 'horizontal',
                                 interval: 10,
                                 offset: 2.00
                             },
                             needles: [
                                        {
                                            value:0,
                                            type: 'pointer',
                                            outerOffset: 0.8,
                                            mediumOffset: 0.7,
                                            width: 10,
                                            fillStyle: '#252E32'
                                        }
                             ],
                             ranges: [
                                        {
                                            outerOffset: 0.82,
                                            innerStartOffset: 0.76,
                                            innerEndOffset: 0.68,
                                            startValue: 0,
                                            endValue: 35,
                                            fillStyle: gradient1
                                        },
										 {
                                            outerOffset: 0.82,
                                            innerStartOffset: 0.68,
                                            innerEndOffset: 0.70,
                                            startValue: 35,
                                            endValue: 70,
                                            fillStyle: gradient3
                                        },
                                        {
                                            outerOffset: 0.82,
                                            innerStartOffset: 0.70,
                                            innerEndOffset: 0.76,
                                            startValue: 70,
                                            endValue: 100,
                                            fillStyle: gradient2
                                        }
                             ]
                         }
                ]
            });

            
        });