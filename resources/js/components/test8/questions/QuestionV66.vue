<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div
            class="test-main test-main-66 test-indicated-by-arrows test-indicated-by-arrow"
        >
            <div class="test-caption">
                <p>
                    Иннервация мышц глазного яблока глазодвигательными нервами
                    <span>
                    Раскрасьте схему в соответствии с условными обозначениями.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance test-compliance__img" id="stage-parent">
                <div
                    v-if="!completed"
                    class="compliance-img"
                    id="question_66"
                ></div>
                <div v-if="completed" class="compliance-img" id="question_66">
                    <img
                        :src="currentUrl + '/test-img/answer66.png'"
                        alt="courses"
                        v-bind:class="{
                            correct: correct == 1,
                            incorrect: correct == 0
                        }"
                    />
                </div>
            </div>
            <div class="swipe-block">
                <div class="row">
                    <div class="col-sm-2 col-3">
                        <img
                            :src="currentUrl + '/test-img/arm1.png'"
                            alt="courses"
                        />
                        <img
                            :src="currentUrl + '/test-img/arm2.png'"
                            alt="courses"
                        />
                    </div>
                    <div class="col-sm-10 col-9">
                        <p>
                            Перемешайте картинку вверх-вниз, влево-впарво и
                            увеличивайтечто бы увидеть ее целиком
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage66 = null;
export default {
    props: {
        number: {
            type: String,
            default: "01"
        },
        from: {
            type: String,
            default: "01"
        },
        completed: {
            type: Boolean
        },
        serverAnswers: {
            type: Array
        },
      questions: {
            type: Number,
        },
        ordinalNumber: {
            type: String,
            default: "01"
        },
    },

    data() {
        return {
            list: [
                "M 64.00,74.00 C 65.66,54.26 80.25,39.62 97.00,30.78 126.47,15.22 166.52,14.54 197.00,27.65 216.15,35.89 234.96,51.72 236.00,74.00 236.00,74.00 64.00,74.00 64.00,74.00 Z",
                "M 112.00,98.00 C 112.00,98.00 188.00,98.00 188.00,98.00 188.00,98.00 188.00,123.00 188.00,123.00 178.82,121.28 170.87,115.03 151.00,115.00 143.04,114.99 135.69,115.71 128.00,117.91 128.00,117.91 112.00,123.00 112.00,123.00 112.00,123.00 112.00,98.00 112.00,98.00 Z",
                "M 241.00,100.00 C 243.75,101.97 250.80,107.42 250.80,111.00 250.80,113.49 247.63,116.33 246.00,118.00 246.00,118.00 232.00,132.00 232.00,132.00 229.38,134.62 220.35,144.79 217.09,144.80 215.00,144.81 208.30,137.78 206.00,136.00 206.00,136.00 241.00,100.00 241.00,100.00 Z",
                "M 147.00,121.42 C 154.47,120.58 167.74,123.02 175.00,125.34 184.37,128.35 193.38,133.22 201.00,139.46 239.12,170.70 239.33,229.75 202.00,261.70 195.58,267.20 186.00,272.86 178.00,275.66 170.83,278.16 156.42,281.34 149.00,280.82 131.89,279.60 115.85,275.28 102.04,264.62 63.77,235.09 59.81,178.51 94.13,144.30 105.68,132.79 120.88,124.97 137.00,122.44 137.00,122.44 147.00,121.42 147.00,121.42 Z",
                "M 148.00,156.30 C 143.63,156.91 139.18,157.31 135.00,158.80 117.94,164.87 106.03,180.91 106.00,199.00 106.00,199.00 106.00,205.00 106.00,205.00 106.25,225.77 124.21,242.36 144.00,245.13 147.17,245.57 148.72,246.01 152.00,245.70 163.11,244.64 173.83,240.97 181.91,232.91 210.68,204.17 188.83,154.22 148.00,156.30 Z",
                "M 25.00,163.00 C 25.00,163.00 73.00,163.00 73.00,163.00 60.93,191.48 60.93,210.52 73.00,239.00 73.00,239.00 25.00,239.00 25.00,239.00 25.00,239.00 25.00,163.00 25.00,163.00 Z",
                "M 143.00,163.23 C 146.23,163.02 148.76,162.97 152.00,163.23 189.43,163.43 202.71,216.57 168.00,234.74 160.50,238.66 157.30,239.09 149.00,239.00 122.22,238.69 104.59,210.43 114.95,186.00 120.04,174.01 130.53,166.24 143.00,163.23 Z",
                "M 228.00,163.00 C 228.00,163.00 253.00,163.00 253.00,163.00 253.00,163.00 253.00,239.00 253.00,239.00 253.00,239.00 228.00,239.00 228.00,239.00 231.65,225.50 235.98,219.44 236.00,204.00 236.02,191.66 235.50,184.94 231.48,173.00 231.48,173.00 228.00,163.00 228.00,163.00 Z",
                "M 147.00,189.42 C 131.04,195.07 138.22,215.93 153.00,212.61 161.39,210.72 165.27,199.82 159.57,193.21 156.17,189.27 151.81,188.76 147.00,189.42 Z",
                "M 206.00,266.00 C 208.18,264.10 214.60,257.16 217.04,257.19 220.40,257.23 229.32,267.32 232.00,270.00 232.00,270.00 246.00,284.00 246.00,284.00 247.63,285.67 250.80,288.51 250.80,291.00 250.80,295.02 243.30,300.44 240.00,302.00 240.00,302.00 230.17,291.83 230.17,291.83 230.17,291.83 206.00,266.00 206.00,266.00 Z",
                "M 112.00,279.00 C 122.93,280.98 129.66,286.97 149.00,287.00 158.14,287.01 165.18,286.10 174.00,283.57 174.00,283.57 188.00,279.00 188.00,279.00 188.00,279.00 188.00,304.00 188.00,304.00 188.00,304.00 112.00,304.00 112.00,304.00 112.00,304.00 112.00,279.00 112.00,279.00 Z"
            ],
            testPass: false,
            labelOfRectungle: ["III пара", "VI пара", "IV пара"],
            colorRect: ["green", "purple", "red"],
            stage66Width: 625,
            stage66Height: 600,
            currentUrl: "",
            answers: [
                {
                    result: [],
                    correct: [
                        "a path piece 6 rectungle0",
                        "a path piece 1 rectungle0",
                        "a path piece 10 rectungle0",
                        "a path piece 0 rectungle0",
                        "a path piece 7 rectungle0",
                        "a path piece 9 rectungle0",
                        "a path piece 5 rectungle1",
                        "a path piece 2 rectungle2"
                    ]
                }
            ]
        };
    },
    methods: {
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent");

            // now we need to fit stage into parent
            var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            var scale = containerWidth / this.stage66Width;
            //var scale = 0.94;

            stage66.width(this.stage66Width * scale);
            stage66.height(this.stage66Height * scale);
            stage66.scale({
                x: scale,
                y: scale
            });
            stage66.draw();
        },

        // adapt the stage on any window resiz

        onStart() {
            const self = this;
            stage66 = new Konva.Stage({
                container: "question_66",
                width: this.stage66Width,
                height: this.stage66Height
            });
            var layer = new Konva.Layer();

            stage66.add(layer);
            var group = new Konva.Group();
            var tempLayer = new Konva.Layer();
            stage66.add(tempLayer);
            var answerList = [];
            var path;
            var rectungle;
            var text;

            var borderOfRect;
            for (var i = 0; i < this.list.length; i++) {
                path = new Konva.Path({
                    y: 30,
                    fill: "#f5f5f5",
                    data: this.list[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25,
                    scaleX: 0.95,
                    scaleY: 0.95
                });
                layer.add(path);
            }

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/66-2.png`,
                function(darthNode) {
                    darthNode.setAttrs({
                        x: 380,
                        y: 30,
                        scaleX: 0.95,
                        scaleY: 0.95,
                        innerRadius: 20,
                        outerRadius: 25
                    });
                    tempLayer.add(darthNode);
                    tempLayer.batchDraw();
                }
            );
            Konva.Image.fromURL(`${this.currentUrl}/test-img/66.png`, function(
                darthNode
            ) {
                darthNode.setAttrs({
                    x: 0,
                    y: 30,
                    scaleX: 0.95,
                    scaleY: 0.95,
                    innerRadius: 20,
                    outerRadius: 25
                });
                tempLayer.add(darthNode);
                tempLayer.batchDraw();
            });

            layer.draw();
            for (var i = 0; i < 3; i++) {
                borderOfRect = new Konva.Rect({
                    cornerRadius: 5,
                    x: 0,
                    y: 400 + i * 65,
                    width: 198,
                    height: 52,
                    fill: "#f5f5f5",
                    stroke: "#e6e6e6",
                    strokeWidth: 1
                });
                group.add(borderOfRect);
                rectungle = new Konva.Rect({
                    cornerRadius: 5,
                    x: 29,
                    y: 415 + i * 63,
                    width: 25,
                    height: 25,
                    name: "rectungle" + i,
                    fill: this.colorRect[i],
                    draggable: true
                });
                group.add(rectungle);
                text = new Konva.Text({
                    x: 65,
                    y: 418 + i * 63,
                    draggable: false,
                    fill: "black",
                    text: this.labelOfRectungle[i]
                });
                text.fontSize(22);
                group.add(text);
            }
            tempLayer.add(group);
            tempLayer.draw();
            var targetPositionX;
            var targetPositionY;
            stage66.on("dragstart", function(e) {
                e.target.moveTo(tempLayer);
                targetPositionX = e.target.attrs.x;
                targetPositionY = e.target.attrs.y;
                this.colorRect = e.target.fill();
                //console.log("Moving " + e.target.name());
                layer.draw();
            });

            var previousShape;
            stage66.on("dragmove", function(evt) {
                var pos = stage66.getPointerPosition();
                var shape = layer.getIntersection(pos);
                if (previousShape && shape) {
                    if (previousShape !== shape) {
                        // leave from old targer
                        previousShape.fire(
                            "dragleave",
                            {
                                type: "dragleave",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );

                        // enter new targer
                        shape.fire(
                            "dragenter",
                            {
                                type: "dragenter",
                                target: shape,
                                evt: evt.evt
                            },
                            true
                        );
                        previousShape = shape;
                    } else {
                        previousShape.fire(
                            "dragover",
                            {
                                type: "dragover",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );
                    }
                } else if (!previousShape && shape) {
                    previousShape = shape;
                    shape.fire(
                        "dragenter",
                        {
                            type: "dragenter",
                            target: shape,
                            evt: evt.evt
                        },
                        true
                    );
                } else if (previousShape && !shape) {
                    previousShape.fire(
                        "dragleave",
                        {
                            type: "dragleave",
                            target: previousShape,
                            evt: evt.evt
                        },
                        true
                    );
                    previousShape = undefined;
                }
            });
            var ansKube66 = {};
            stage66.on("dragend", function(e) {
                var pos = stage66.getPointerPosition();
                var shape = layer.getIntersection(pos);
                if (shape) {
                    previousShape.fire(
                        "drop",
                        {
                            type: "drop",
                            target: previousShape,
                            evt: e.evt
                        },
                        true
                    );
                }
                if (previousShape != undefined) {
                    e.target.setAttrs({
                        x: targetPositionX,
                        y: targetPositionY
                    });
                    ansKube66.numOfRect = e.target.name();
                    answerList.push(ansKube66);
                    self.answers[0].result.push(
                        `${ansKube66.numOfPath} ${ansKube66.numOfRect}`
                    );
                    ansKube66 = {};
                }
                previousShape = undefined;
                layer.draw();
                tempLayer.draw();
            });

            stage66.on("dragenter", function(e) {
                e.target.fill("red");
                //console.log("dragenter " + e.target.name());
                layer.draw();
            });

            stage66.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                //("dragleave " + e.target.name());
                layer.draw();
            });

            stage66.on("dragover", function(e) {
                //console.log("dragover " + e.target.name());
                layer.draw();
            });

            stage66.on("drop", function(e) {
                e.target.fill(this.colorRect);
                //console.log("drop " + e.target.name());
                ansKube66.numOfPath = e.target.name();
                //console.log(answerList);
                e.target.moveTo(tempLayer);
                this.colorRect = "";
                layer.draw();
            });
            this.fitStageIntoParentContainer();
        }
    },
    mounted() {
        if (!this.completed)
        {
            setTimeout(() => {
                this.onStart();
                let swiper = document.querySelector(".test-swiper").swiper
                swiper.update()
            }, 2000)
        }
    },
    created() {

        this.currentUrl = window.location.origin;

        window.addEventListener("resize", this.fitStageIntoParentContainer);
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 66,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "66");
        },
        correct() {
            if (!this.serverAnswers) {
                return null;
            }

            try {
                if (this.currentQuestionAnswers.answer[0].result) {
                    return 1;
                } else {
                    return 0;
                }
            } catch (error) {
                return 0;
            }
        }
    }
};
</script>
