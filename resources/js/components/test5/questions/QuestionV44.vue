<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div
            class="test-main test-main-44 test-exercise-in-topical-diagnostics"
        >
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
                        у больного имеется половинное поражение спинного мозга
                        на уровне Th10 слева.
                        <br />
                        На схеме изображены проводники чувствительности,
                        проходящие через пораженный участок (1 и 2).
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
                        :src="currentUrl + '/test-img/test96.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block" style="margin-left:20px">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br />
                            у больного имеется половинное поражение спинного
                            мозга на уровне Th10 слева.
                            <br />
                            На схеме изображены проводники чувствительности,
                            проходящие через пораженный участок (1 и 2).
                        </p>
                    </div>
                    <ul>
                        <li v-for="(item, index) in answers" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description1
                                }}<img
                                    :src="currentUrl + '/' + item.image"
                                    alt="courses"
                                />{{ item.description2 }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[index].result,
                                            answer[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[index].result,
                                            answer[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                    <p class="compliance-txt">
                        Д) Изобразите на фигуре человека
                    </p>
                    <div id="stage-parent44">
                        <div v-if="!completed" id="question_44"></div>
                        <div v-if="completed" id="question_44">
                            <img
                                :src="currentUrl + '/test-img/answer44.png'"
                                alt="courses"
                                v-bind:class="{
                                    correct:
                                        correctArray(
                                            answer[4].result,
                                            answer[4].correct
                                        ) == 1,
                                    incorrect:
                                        correctArray(
                                            answer[4].result,
                                            answer[4].correct
                                        ) == 0
                                }"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage44 = null;
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
            answerList: [],
            testPass: false,
            answers: [
                {
                    part: 0,
                    symbol: "А",
                    description1:
                        " Укажите синдром анестезии, обусловленный поражением проводников глубокой (",
                    image: "test-img/icon3.png",
                    description2: ") чувствительности.",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Б",
                    description1:
                        " Укажите синдром анестезии, обусловленный поражением проводников поверхностной (",
                    image: "test-img/icon4.png",
                    description2: ") чувствительности.",
                    result: null
                },
                {
                    part: 0,
                    symbol: "В",
                    description1:
                        " На какой стороне разовьется анестезия, обусловленный поражением проводников глубокой (",
                    image: "test-img/icon3.png",
                    description2: ") чувствительности?",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Г",
                    description1:
                        " На какой стороне разовьется анестезия, обусловленный поражением проводников поверхностной (",
                    image: "test-img/icon4.png",
                    description2: ") чувствительности?",
                    result: null
                }
            ],
            answer: [
                {
                    result: null,
                    correct:
                        "Развивается синдром проводниковой анестезии поверхностной чувствительности с Th10"
                },
                {
                    result: null,
                    correct:
                        "Развивается синдром проводниковой анестезии глубокой и сложной чувствительности с Th10"
                },
                {
                    result: null,
                    correct: "справа"
                },
                {
                    result: null,
                    correct: "слева"
                },
                {
                    result: [],
                    correct: [
                        "a path piece 1 rect answer 2",
                        "a path piece 0 rect answer 1"
                    ]
                }
            ],
            body44: [
                "M 71.00,228.00 C 77.98,236.25 81.98,236.06 82.00,247.00 82.03,260.75 82.50,271.24 80.25,285.00 78.77,294.02 74.68,302.78 75.04,312.00 75.04,312.00 76.79,330.00 76.79,330.00 76.35,338.62 74.86,347.53 73.20,356.00 73.20,356.00 70.89,367.00 70.89,367.00 70.89,367.00 70.39,383.00 70.39,383.00 70.99,387.12 73.43,400.51 72.42,403.87 70.76,409.33 59.11,407.06 55.21,405.14 50.02,402.58 53.66,393.99 55.21,390.00 56.83,385.79 58.53,381.57 58.79,377.00 58.79,377.00 53.01,334.00 53.01,334.00 53.01,334.00 55.00,308.00 55.00,308.00 55.00,308.00 49.00,256.00 49.00,256.00 48.84,242.29 48.96,235.67 51.42,222.00 53.77,209.01 56.44,196.12 56.44,196.12 56.44,196.12 82.00,196.31 82.00,196.31 82.00,196.31 83.19,230.75 83.31,237.62 80.19,234.50 74.25,230.33 71.00,228.00 Z",
                "M 111.36,191.27 C 105.74,191.27 94.39,190.75 81.64,191.00 81.76,196.88 83.62,232.81 83.25,237.69 86.50,236.69 89.86,230.90 96.00,228.00 87.77,239.48 85.02,234.74 85.14,247.00 85.14,247.00 85.14,281.00 85.14,281.00 85.14,281.00 90.82,305.00 90.82,305.00 90.82,305.00 88.32,331.00 88.32,331.00 87.47,342.37 94.60,360.07 94.71,365.00 94.81,368.92 92.65,371.27 92.46,375.00 92.46,375.00 92.46,384.00 92.46,384.00 92.46,384.00 87.00,407.00 87.00,407.00 92.84,407.12 103.20,408.71 107.44,403.72 111.70,398.71 108.03,384.67 108.00,378.00 107.94,363.75 113.46,355.96 112.96,343.00 112.96,343.00 108.09,298.00 108.09,298.00 108.81,286.99 116.75,268.63 117.00,248.00 117.35,217.67 111.86,201.52 111.36,191.27 Z",
                "M 117.04,170.00 C 117.04,170.00 121.53,181.00 121.53,181.00 123.76,187.75 124.72,193.25 127.89,200.00 127.89,200.00 142.05,225.00 142.05,225.00 145.50,234.28 140.77,254.03 154.00,256.51 158.10,257.28 161.34,253.90 161.67,250.00 162.02,245.81 158.23,241.58 157.00,235.00 157.00,235.00 167.00,235.00 167.00,235.00 162.02,231.70 159.53,231.26 155.39,226.00 149.91,219.03 149.60,206.72 147.37,198.00 143.97,184.70 139.02,180.43 139.00,166.00 138.97,146.53 140.50,118.38 131.70,103.96 138.55,114.82 119.39,131.66 116.00,131.00 116.18,142.64 114.57,160.13 117.04,170.00 Z",
                "M 53.00,130.00 C 53.00,130.00 56.00,130.00 56.00,130.00 56.00,130.00 58.00,154.00 58.00,154.00 58.00,154.00 58.00,179.00 58.00,179.00 57.98,191.92 56.50,196.12 56.50,196.12 56.50,196.12 81.91,196.40 81.91,196.27 81.91,193.66 81.64,193.84 81.64,191.09 84.76,190.84 108.64,191.18 111.36,191.27 111.49,189.52 109.03,191.77 109.00,171.00 108.98,158.96 108.91,155.15 110.92,143.00 111.72,138.18 111.60,133.77 116.00,131.00 119.76,131.67 138.31,113.88 131.68,104.00 128.83,97.91 124.54,92.74 119.00,88.90 111.57,83.76 103.05,81.13 98.97,72.00 96.70,66.94 97.60,64.16 98.00,59.00 105.50,47.75 111.51,33.86 109.08,20.00 107.91,13.35 105.47,6.43 99.00,3.17 95.53,1.43 89.77,1.94 86.00,2.47 67.65,6.78 65.97,15.46 66.00,32.00 66.02,46.37 70.00,48.62 73.88,58.50 75.21,63.11 77.04,70.33 75.26,75.00 72.47,82.31 64.19,85.33 58.00,88.87 50.09,93.40 42.85,98.91 38.35,107.00 30.25,118.25 42.00,131.62 53.00,130.00 Z",
                "M 38.62,106.75 C 29.50,119.50 44.00,132.38 53.38,129.88 53.38,123.88 55.02,155.23 55.00,168.00 54.98,180.37 51.61,181.90 47.42,193.00 43.06,204.57 39.35,217.52 32.56,228.00 25.10,239.51 30.15,239.28 25.64,246.98 20.55,255.68 9.53,256.38 3.00,249.00 10.90,246.15 12.71,243.25 14.00,235.00 9.68,236.04 7.86,236.50 4.00,234.00 7.11,232.54 17.44,225.78 18.98,222.96 18.98,222.96 22.74,201.00 22.74,201.00 27.36,182.70 31.73,185.56 32.00,162.00 32.00,162.00 33.00,149.00 33.00,149.00 33.16,134.98 29.75,119.50 38.62,106.75 Z"
            ],
            colorRect: "",
            question_44Width: 367,
            question_44Height: 430
        };
    },
    methods: {
        insensitiveSearch(str1, str2) {
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
        correctArray(a, b) {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.equals(a, b)) {
                return 1;
            }

            return 0;
        },
        equals(a, b) {
            if (a.length !== b.length) {
                return false;
            }

            var seen = {};
            a.forEach(function(v) {
                var key = typeof v + v;
                if (!seen[key]) {
                    seen[key] = 0;
                }
                seen[key] += 1;
            });

            return b.every(function(v) {
                var key = typeof v + v;
                if (seen[key]) {
                    seen[key] -= 1;
                    return true;
                }
            });
        },
        getAnswerList(part) {
            return this.answers.filter(item => item.part === part);
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
            var container = document.querySelector("#stage-parent44");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            var scale = 0.8;

            stage44.width(this.question_44Width * scale);
            stage44.height(this.question_44Height * scale);
            stage44.scale({
                x: scale,
                y: scale
            });
            stage44.draw();
        },

        onStart() {
            const self = this;
            this.answerList = [];
            stage44 = new Konva.Stage({
                container: "question_44",
                width: this.question_44Width,
                height: this.question_44Height
            });
            var templayer44 = new Konva.Layer();
            var layer44 = new Konva.Layer();
            var group44 = new Konva.Group();
            var answerList44 = [];
            stage44.add(layer44);
            stage44.add(templayer44);
            var path44;
            for (var i = 0; i < this.body44.length; i++) {
                path44 = new Konva.Path({
                    x: 0,
                    y: 0,
                    fill: "#f5f5f5",
                    data: this.body44[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25
                });
                layer44.add(path44);
            }
            var rectungle44;
            var text44;
            var borderOfRect44;

            borderOfRect44 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 0,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group44.add(borderOfRect44);
            rectungle44 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 15,
                width: 25,
                height: 25,
                name: "rect answer 1",
                fill: this.getRandomColor(),
                draggable: true
            });
            group44.add(rectungle44);
            text44 = new Konva.Text({
                x: 235,
                y: 22,
                draggable: false,
                fill: "black",
                text: "Поверхностная"
            });
            group44.add(text44);

            borderOfRect44 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 65,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group44.add(borderOfRect44);
            rectungle44 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 80,
                width: 25,
                height: 25,
                name: "rect answer 2",
                fill: this.getRandomColor(),
                draggable: true
            });
            group44.add(rectungle44);
            text44 = new Konva.Text({
                x: 235,
                y: 87,
                draggable: false,
                fill: "black",
                text: "Глубокая"
            });
            group44.add(text44);

            borderOfRect44 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 130,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group44.add(borderOfRect44);
            var clear_rectungle44;
            clear_rectungle44 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 145,
                width: 25,
                height: 25,
                name: "rectungle сlear",
                fill: "#f5f5f5",
                stroke: "black",
                strokeWidth: 2,
                draggable: false
            });
            group44.add(clear_rectungle44);
            text44 = new Konva.Text({
                x: 235,
                y: 153,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group44.add(text44);

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/test39.png`,
                function(darthNode) {
                    darthNode.setAttrs({
                        x: 0,
                        y: 0,
                        scaleX: 1,
                        scaleY: 1
                    });
                    templayer44.add(darthNode);
                    templayer44.batchDraw();
                }
            );

            templayer44.add(group44);
            templayer44.draw();
            layer44.draw();

            stage44.on("dragstart", function(e) {
                e.target.moveTo(templayer44);
                this.colorRect = e.target.fill();
                //console.log("Moving " + e.target.name());
                layer44.draw();
            });

            var previousShape;
            stage44.on("dragmove", function(evt) {
                var pos = stage44.getPointerPosition();
                var shape = layer44.getIntersection(pos);
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
            var ansKube44 = {};
            stage44.on("dragend", function(e) {
                var pos = stage44.getPointerPosition();
                var shape = layer44.getIntersection(pos);
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
                    ansKube44.numOfRect = e.target.name();
                    self.answerList.push(ansKube44);
                    e.target.destroy();
                    ansKube44 = {};
                }
                previousShape = undefined;
                layer44.draw();
                templayer44.draw();
            });

            stage44.on("dragenter", function(e) {
                e.target.fill("red");
                //console.log("dragenter " + e.target.name());
                layer44.draw();
            });

            stage44.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                //console.log("dragleave " + e.target.name());
                layer44.draw();
            });

            stage44.on("dragover", function(e) {
                //console.log("dragover " + e.target.name());
                layer44.draw();
            });

            stage44.on("drop", function(e) {
                e.target.fill(this.colorRect);
                //console.log("drop " + e.target.name());
                ansKube44.numOfPath = e.target.name();
                //console.log(answerList44);
                e.target.moveTo(templayer44);
                this.colorRect = "";
                layer44.draw();
            });
            this.fitStageIntoParentContainer();
            clear_rectungle44.on("click", this.onStart);
            clear_rectungle44.on("tap", this.onStart);
        }
    },
    watch: {
        answerList: {
            handler: function(newVal, oldVal) {
                this.answer[4].result = [];
                this.answerList.forEach(element => {
                    this.answer[4].result.push(
                        `${element.numOfPath} ${element.numOfRect}`
                    );
                });
            },
            deep: true
        },
        answer: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 44,
                    answer: this.answer
                });
            },
            deep: true
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
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "44");
        }
    }
};
</script>
