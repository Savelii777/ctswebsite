<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-exercise-in-topical-diagnostics">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b>Дано:</b><br />
                        очаг поражения в задней центральной извилине коры
                        больших полушарий, в нижних ее отделах слева.
                    </p>
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
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test92.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block" style="margin-left:20px">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br />
                            очаг поражения в задней центральной извилине коры
                            больших полушарий, в нижних ее отделах слева.
                        </p>
                    </div>
                    <ul>
                        <li v-for="(item, index) in firstPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}.
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[0].result"
                                :readonly="serverAnswers"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[0].result,
                                            answer[0].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[0].result,
                                            answer[0].correct
                                        ) == 0
                                }"
                            />
                        </li>
                    </ul>
                    <p class="compliance-txt">
                        Б) Зачертите территорию распространения анестезии на
                        фигуре человека
                    </p>
                    <div id="stage-parent40">
                        <div v-if="!completed" id="question_40"></div>
                        <div v-if="completed" id="question_40">
                            <img
                                :src="currentUrl + '/test-img/answer40.png'"
                                alt="courses"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[2].result,
                                            answer[2].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[2].result,
                                            answer[2].correct
                                        ) == 0
                                }"
                            />
                        </div>
                    </div>
                    <p class="compliance-txt">
                        В) Все ли виды чувствительности здесь нарушены?
                        <span>
                            <img
                                :src="currentUrl + '/test-img/icon3.png'"
                                alt="courses"
                            />
                            поверхностная
                            <img
                                :src="currentUrl + '/test-img/icon4.png'"
                                alt="courses"
                            />
                            глубокая и сложная
                        </span>
                    </p>
                    <div class="radio test-radio">
                        <div>
                            <div
                                class="answer-item"
                                v-for="(item, index) in secondPart"
                                :key="index"
                            >
                                <input
                                    :id="'v40-radio' + index"
                                    type="radio"
                                    name="radio40v"
                                    :value="index"
                                    v-model="answer[1].result"
                                    :disabled="serverAnswers"
                                />
                                <label
                                    :for="'v40-radio' + index"
                                    v-bind:class="{
                                        correct:
                                            correctTest(
                                                answer[1].result,
                                                answer[1].correct
                                            ) == 1,
                                        incorrect:
                                            correctTest(
                                                answer[1].result,
                                                answer[1].correct
                                            ) == 0
                                    }"
                                >
                                    {{ item.symbol }}. {{ item.description }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage40 = null;
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
            currentUrl: "",
            etalon: "a path piece 0",
            testPass: false,
            answerList: [],
            answers: [
                {
                    part: 0,
                    symbol: "А",
                    description: " Укажите тип нарушения чувствительности.",
                    result: null
                },
                {
                    part: 2,
                    symbol: "1",
                    result: null,
                    description: "Да"
                },
                {
                    part: 2,
                    symbol: "2",
                    result: null,
                    description: "Нет"
                }
            ],
            answer: [
                {
                    correct:
                        "правосторонняя моноанестезия: руки, верхней части туловища и головы (так называемая «псевдосегментарная анестезия»)",
                    result: ""
                },
                {
                    correct: 0,
                    result: 0
                },
                {
                    correct: "a path piece 0",
                    result: ""
                }
            ],
            body40: [
                "M 58.00,179.00 C 58.00,179.00 58.00,153.00 58.00,153.00 57.99,145.98 57.45,135.02 54.00,129.00 53.11,134.49 54.29,143.32 54.92,149.00 54.92,149.00 54.92,168.00 54.92,168.00 54.98,180.37 51.61,181.90 47.42,193.00 42.30,206.58 39.33,217.42 31.17,230.00 26.42,237.31 29.43,239.56 26.16,246.00 21.38,255.42 9.92,256.82 3.00,249.00 10.90,246.15 12.71,243.25 14.00,235.00 9.68,236.04 7.86,236.50 4.00,234.00 7.11,232.54 17.44,225.78 18.98,222.96 18.98,222.96 23.13,200.00 23.13,200.00 27.40,182.75 31.75,184.93 32.00,163.00 32.00,163.00 33.00,150.00 33.00,150.00 33.16,135.89 31.23,119.80 38.35,107.00 42.68,99.20 50.35,93.25 58.00,88.87 64.01,85.43 71.89,82.82 74.91,75.99 77.23,70.76 75.67,64.16 74.00,59.00 69.82,45.64 66.02,45.63 66.00,32.00 65.97,15.46 67.90,6.82 86.25,2.50 86.25,2.50 84.91,164.36 84.91,164.36 84.91,164.36 80.58,166.86 58.00,179.00 Z",
                "M 86.25,2.50 C 86.25,3.16 84.91,164.37 84.91,164.37 84.91,164.37 109.50,176.75 109.50,176.75 109.50,176.75 109.00,152.00 109.00,152.00 109.00,152.00 113.75,131.00 113.75,131.00 113.75,131.00 115.50,134.00 115.00,147.50 114.75,151.25 116.00,158.75 116.75,164.75 116.75,173.00 124.25,183.25 124.75,191.75 127.00,200.50 139.50,218.00 142.75,224.75 143.50,233.00 142.50,241.75 143.75,245.00 145.00,248.25 152.50,262.75 158.75,255.25 165.00,247.75 160.75,246.00 157.00,235.50 155.50,231.75 162.75,238.75 167.50,235.00 172.25,231.25 159.75,238.75 153.00,222.00 148.25,204.75 149.00,197.25 144.00,188.25 139.00,179.25 138.75,168.25 139.00,152.50 139.25,136.75 137.50,113.00 129.50,100.00 121.50,87.00 103.50,82.25 102.50,78.75 101.50,75.25 95.75,73.75 97.75,57.75 104.25,48.00 109.75,40.50 109.50,30.75 108.91,9.16 105.16,1.06 86.25,2.50 Z",
                "M 109.50,176.75 C 109.68,179.66 116.45,221.45 116.82,230.09 117.55,253.27 116.64,260.27 114.09,270.64 112.55,280.55 109.45,281.91 108.36,298.09 107.91,310.64 111.82,318.27 111.91,331.73 113.55,347.91 113.27,350.55 109.36,365.09 108.91,374.55 108.64,375.45 108.18,379.73 109.73,389.55 109.82,390.64 109.91,400.00 109.64,404.00 105.73,405.91 101.18,407.45 96.64,409.00 90.45,407.64 86.91,406.55 87.64,400.55 92.45,387.00 92.64,382.00 92.18,376.73 91.64,378.73 91.18,375.73 90.73,372.73 94.45,370.82 95.18,366.00 94.82,360.73 88.82,349.27 88.55,339.27 86.91,323.82 89.36,323.45 90.27,307.73 89.00,291.55 88.00,292.82 85.27,283.64 84.82,274.91 85.00,249.55 85.09,239.36 92.00,231.64 91.55,233.91 95.00,228.45 94.73,227.64 89.36,234.36 83.45,237.64 83.45,228.36 84.91,164.37 84.91,164.37 84.91,164.37 105.93,174.95 109.50,176.75 Z",
                "M 84.91,164.36 C 84.79,169.38 83.43,231.08 83.45,237.64 76.91,232.37 75.82,230.91 72.00,229.27 72.73,231.64 81.27,236.00 81.64,239.64 82.55,243.27 83.09,274.73 80.73,283.82 80.00,290.36 75.45,300.73 75.45,306.91 75.64,318.91 77.82,328.36 76.00,339.09 75.27,349.27 72.18,360.91 70.91,366.73 69.64,372.55 71.09,372.00 71.82,374.73 72.55,377.45 69.64,376.00 69.45,379.09 72.18,387.09 73.45,398.73 72.55,403.64 72.55,408.73 68.55,408.18 60.55,406.55 55.82,405.64 51.64,406.91 52.00,401.64 52.36,396.36 57.27,388.00 57.82,380.00 58.91,360.55 55.45,362.73 52.73,338.55 53.45,317.09 55.45,321.09 55.09,306.91 54.00,292.36 52.91,292.00 52.00,282.55 51.09,273.09 45.09,256.00 50.55,227.64 53.82,211.27 58.18,191.36 58.00,179.00 81.27,166.45 78.77,167.76 84.91,164.36 Z"
            ],
            colorRect: "",
            question_40Width: 367,
            question_40Height: 430
        };
    },
    computed: {
        firstPart() {
            return this.answers.filter(item => item.part === 0);
        },
        secondPart() {
            return this.answers.filter(item => item.part === 2);
        },
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "40");
        }
    },
    methods: {
        insensitiveSearch(str1, str2) {
            try {
                str1 = str1.replace("(", "");
                str1 = str1.replace(")", "");
                str2 = str2.replace("(", "");
                str2 = str2.replace(")", "");
            } catch (error) {}

            let search_str = new RegExp(str2, "ig");

            if (!str1) return false;

            var result = str1.search(search_str);

            return result != -1;
        },
        correct(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.insensitiveSearch(answer, correct)) {
                return 1;
            }

            return 0;
        },
        correctTest(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (answer === correct) {
                return 1;
            }

            return 0;
        },
        getRandomColor() {
            var letters = "0123456789ABCDEF";
            var color = "#";
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        },
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent40");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            var scale = 0.8;

            stage40.width(this.question_40Width * scale);
            stage40.height(this.question_40Height * scale);
            stage40.scale({
                x: scale,
                y: scale
            });
            stage40.draw();
        },

        onStart() {
            const self = this;
            stage40 = new Konva.Stage({
                container: "question_40",
                width: this.question_40Width,
                height: this.question_40Height
            });
            var templayer40 = new Konva.Layer();
            var layer40 = new Konva.Layer();
            var group40 = new Konva.Group();
            stage40.add(layer40);
            stage40.add(templayer40);
            var path40;
            for (var i = 0; i < this.body40.length; i++) {
                path40 = new Konva.Path({
                    x: 0,
                    y: 0,
                    fill: "#f5f5f5",
                    data: this.body40[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25
                });
                layer40.add(path40);
            }
            var rectungle40;
            var text40;
            var borderOfRect40;

            borderOfRect40 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 0,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group40.add(borderOfRect40);
            rectungle40 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 15,
                width: 25,
                height: 25,
                name: "rect answer",
                fill: this.getRandomColor(),
                draggable: true
            });
            group40.add(rectungle40);
            text40 = new Konva.Text({
                x: 235,
                y: 22,
                draggable: false,
                fill: "black",
                text: "Выделить"
            });
            group40.add(text40);

            borderOfRect40 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 65,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group40.add(borderOfRect40);
            var clear_rectungle40;
            clear_rectungle40 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 80,
                width: 25,
                height: 25,
                name: "rectungle сlear",
                fill: "#f5f5f5",
                stroke: "black",
                strokeWidth: 2,
                draggable: false
            });
            group40.add(clear_rectungle40);
            text40 = new Konva.Text({
                x: 235,
                y: 87,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group40.add(text40);

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/test39.png`,
                function(darthNode) {
                    darthNode.setAttrs({
                        x: 0,
                        y: 0,
                        scaleX: 1,
                        scaleY: 1
                    });
                    templayer40.add(darthNode);
                    templayer40.batchDraw();
                }
            );

            templayer40.add(group40);
            templayer40.draw();
            layer40.draw();

            stage40.on("dragstart", function(e) {
                e.target.moveTo(templayer40);
                this.colorRect = e.target.fill();
                //console.log("Moving " + e.target.name());
                layer40.draw();
            });

            var previousShape;
            stage40.on("dragmove", function(evt) {
                var pos = stage40.getPointerPosition();
                var shape = layer40.getIntersection(pos);
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
            var ansKube40 = {};
            stage40.on("dragend", function(e) {
                var pos = stage40.getPointerPosition();
                var shape = layer40.getIntersection(pos);
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
                    ansKube40.numOfRect = e.target.name();
                    self.answerList.push(ansKube40);
                    e.target.destroy();
                    ansKube40 = {};
                }
                previousShape = undefined;
                layer40.draw();
                templayer40.draw();
            });

            stage40.on("dragenter", function(e) {
                e.target.fill("red");
                //console.log("dragenter " + e.target.name());
                layer40.draw();
            });

            stage40.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                //console.log("dragleave " + e.target.name());
                layer40.draw();
            });

            stage40.on("dragover", function(e) {
                //console.log("dragover " + e.target.name());
                layer40.draw();
            });

            stage40.on("drop", function(e) {
                e.target.fill(this.colorRect);
                //console.log("drop " + e.target.name());
                ansKube40.numOfPath = e.target.name();
                //console.log(answerList40);
                e.target.moveTo(templayer40);
                this.colorRect = "";
                layer40.draw();
            });
            this.fitStageIntoParentContainer();
            clear_rectungle40.on("click", this.onStart);
            clear_rectungle40.on("tap", this.onStart);
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
            this.answer = this.currentQuestionAnswers.answer;
        }
    },
    watch: {
        answerList: {
            handler: function(newVal, oldVal) {
                this.answer[2].result = this.answerList[
                    this.answerList.length - 1
                ].numOfPath;
            },
            deep: true
        },
        answer: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 40,
                    answer: this.answer
                });
            },
            deep: true
        }
    }
};
</script>
