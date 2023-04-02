<template>
    <div class="test-block">
        <div style="white-space:nowrap" class="test-number number mr-2">
            {{ordinalNumber}} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-drag test-drag71">
            <div class="test-caption">
                <p>
                    Лицевой, добавочный и подъязычный черепные нервы
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <p class="compliance-txt">
                А) Вписать в схемы двухнейронные пути XI, XII и VII пар
                <br /><b>
                    Выберите то что нужно и наведите на рисунок, закрасьте все
                    соответвующие элементы.
                </b>
            </p>
            <div id="stage-parent71" class="test-compliance">
                <div
                    v-if="!completed"
                    id="question_71"
                    class="compliance-img"
                ></div>
                <div v-if="completed" id="question_71">
                    <div style="display: flex; justify-content: center;">
                        <img
                            :src="currentUrl + '/test-img/answer71.png'"
                            alt="courses"
                            v-bind:class="{
                                correct: correct == 1,
                                incorrect: correct == 0
                            }"
                        />
                    </div>
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
var stage71 = null;
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
    created() {
        this.currentUrl = window.location.origin;
    },
    data() {
        return {
            body71: [
                {
                    id: 16,
                    data:
                        "M 40.47,87.90 C 41.53,88.67 45.94,91.89 47.48,93.15 45.24,94.58 41.53,97.56 40.40,98.33 40.43,95.15 40.43,90.91 40.47,87.90 Z",
                    needed_image: "Image arrow right"
                },
                {
                    id: 15,
                    data:
                        "M 122.81,138.88 C 123.81,139.72 124.97,140.81 125.50,141.44 124.52,142.30 122.94,144.36 122.47,144.72 122.68,144.88 125.90,144.64 127.09,144.88 127.13,144.81 127.16,148.31 127.12,148.31 123.66,148.10 118.79,148.30 118.75,148.31 117.93,148.49 113.88,148.41 112.97,148.34 112.32,147.34 112.30,143.76 111.19,143.81 110.07,143.87 105.39,143.32 103.69,143.50 102.40,144.08 100.97,146.62 100.03,146.09 99.09,145.57 96.11,139.60 96.81,139.72 97.11,138.19 100.13,137.01 100.25,135.25 99.66,134.02 98.43,130.00 96.84,129.19 95.27,128.36 93.31,130.77 91.84,130.06 91.31,129.00 88.73,125.54 87.97,124.31 88.02,122.67 90.02,121.47 90.31,119.94 89.50,118.35 85.53,114.44 84.59,114.44 83.66,114.44 81.53,116.49 80.00,115.84 78.54,114.20 76.30,111.67 75.66,111.09 75.83,110.21 78.03,108.01 77.56,107.12 77.09,106.25 74.29,103.60 72.53,102.38 70.77,102.25 68.29,104.38 67.06,104.03 65.66,103.51 62.75,102.28 61.94,100.75 61.11,99.23 62.00,97.12 62.12,96.06 61.41,95.38 56.46,92.85 55.88,93.03 55.41,93.62 53.31,96.69 53.00,97.00 52.30,97.40 48.81,94.84 47.88,95.19 47.75,94.37 47.84,92.67 47.91,91.44 49.96,91.44 52.45,91.73 53.22,91.84 53.51,92.72 54.18,96.75 54.59,97.22 55.64,97.57 59.05,98.87 59.81,99.28 61.34,99.05 63.25,97.03 64.25,97.03 65.24,97.03 69.16,99.67 70.03,100.84 71.03,101.96 68.85,104.19 68.91,105.12 70.37,106.24 72.81,109.83 74.22,110.12 75.62,110.42 77.97,108.16 78.97,108.16 80.20,109.33 83.05,112.17 83.22,113.28 83.81,114.16 81.61,116.64 81.72,117.47 81.84,118.28 85.69,121.98 86.62,122.56 87.56,123.15 89.62,121.13 91.78,122.06 93.37,124.00 95.42,125.66 95.66,127.53 96.18,128.29 91.77,130.99 92.59,131.75 93.42,132.51 95.09,135.76 96.03,137.34 99.20,138.16 100.66,137.34 100.84,137.44 101.56,138.91 102.57,141.29 103.09,142.75 102.84,144.17 103.06,146.27 103.19,147.66 104.30,147.89 109.08,148.06 110.72,148.06 112.36,148.06 112.33,145.03 112.91,144.03 114.31,144.10 116.60,143.94 117.72,143.94 117.67,143.96 121.19,140.10 122.81,138.88 Z",
                    needed_image: "Image dotted line"
                },
                {
                    id: 16,
                    data:
                        "M 186.27,88.09 C 187.50,89.03 192.50,98.30 192.73,99.36 190.97,99.60 182.46,98.55 181.22,98.38 182.46,95.98 184.81,89.33 186.27,88.09 Z",
                    needed_image: "Image chevrone right"
                },
                {
                    id: 15,
                    data:
                        "M 128.72,131.88 C 128.71,132.10 130.53,135.13 130.53,135.34 130.53,135.56 134.16,133.88 134.28,133.84 134.29,134.13 134.13,137.23 134.16,138.03 134.94,137.99 137.31,137.95 138.03,137.94 138.07,136.38 137.86,132.87 137.81,132.25 138.34,131.78 141.22,128.33 141.22,127.56 141.22,126.80 139.33,125.36 139.16,123.84 139.92,122.49 142.72,119.28 143.66,118.75 144.59,118.23 147.28,120.20 148.22,119.91 149.16,119.62 152.35,116.53 152.88,115.72 153.40,114.89 151.17,112.32 151.88,111.03 152.58,109.74 157.53,107.54 158.12,106.78 159.35,106.73 161.27,109.61 162.09,109.50 162.91,109.38 167.18,107.14 168.47,106.31 168.59,105.50 167.52,102.66 167.88,101.72 168.22,100.78 172.63,99.22 174.16,98.81 175.79,99.34 177.51,101.52 177.69,101.47 177.87,101.40 179.54,100.77 182.12,100.00 181.66,99.18 181.52,98.37 180.47,96.44 178.54,97.08 177.23,97.35 175.88,98.34 175.88,99.05 176.68,100.80 176.50,102.03 174.86,103.20 171.45,105.19 170.22,105.25 168.99,105.31 167.41,103.05 166.47,102.81 165.53,102.58 160.27,105.39 159.75,106.03 159.22,106.68 160.84,109.41 160.72,110.34 159.67,111.28 155.25,114.91 154.44,114.50 153.61,114.10 151.35,112.66 150.06,112.59 148.77,112.54 145.27,116.17 145.09,117.41 144.92,118.63 146.78,120.03 146.72,120.91 146.65,121.79 143.12,125.67 142.19,126.25 141.24,126.25 138.87,125.04 138.22,125.09 137.58,125.15 134.33,129.41 134.62,129.94 132.92,130.15 128.85,131.77 128.72,131.88 Z",
                    needed_image: "Image dot"
                },
                {
                    id: 14,
                    data:
                        "M 120.45,98.45 C 120.45,98.45 122.18,98.64 122.18,98.64 122.18,98.64 120.00,93.36 120.00,93.36 120.00,93.36 117.27,98.82 117.27,98.82 117.27,98.82 119.18,98.64 119.18,98.64 119.19,98.64 120.91,130.55 126.97,143.29 128.03,145.16 132.60,144.45 133.36,142.93 134.24,140.94 133.83,139.29 133.01,138.25 132.16,136.66 128.45,135.73 127.00,138.36 124.18,138.73 120.09,99.82 120.45,98.45 Z",
                    needed_image: "Image chevrone right"
                }
            ],
            secondbrain: [
                {
                    id: 16,
                    data:
                        "M 12.56,43.16 C 12.56,43.16 17.61,47.02 18.04,47.67 16.95,48.77 12.90,51.61 12.69,51.78 12.47,51.94 12.56,43.16 12.56,43.16 Z"
                },
                {
                    id: 13,
                    data:
                        "M 71.70,114.04 C 71.70,114.04 75.13,116.87 75.13,116.87 75.13,116.87 76.27,115.11 76.48,114.70 76.24,114.49 73.48,112.25 73.65,112.09 73.82,111.92 75.93,109.57 75.78,109.43 75.63,109.31 74.37,108.06 74.00,107.78 73.47,108.21 71.65,110.51 71.65,110.57 71.65,110.62 62.91,112.09 62.30,107.61 62.39,100.04 47.91,60.43 42.80,55.09 36.65,50.35 34.35,47.00 18.09,46.17 18.13,47.22 18.01,48.73 18.04,49.22 22.39,48.54 34.52,50.07 40.57,57.48 44.65,60.48 53.30,85.13 59.96,110.83 61.57,115.30 71.70,114.04 71.70,114.04 Z"
                },
                {
                    id: 16,
                    data:
                        "M 126.36,42.73 C 126.66,42.80 130.10,50.39 130.36,50.73 130.63,51.07 123.37,50.29 122.65,50.29 123.03,49.50 126.06,42.65 126.36,42.73 Z"
                },
                {
                    id: 13,
                    data:
                        "M 77.26,105.78 C 77.26,105.82 78.33,107.98 78.61,108.00 78.89,108.02 81.85,106.31 82.00,106.61 82.15,106.91 83.21,110.10 83.39,110.00 83.58,109.91 86.06,108.75 85.61,108.91 85.31,108.41 84.52,106.00 84.17,105.00 86.60,93.32 90.68,67.59 123.13,51.65 123.06,51.39 121.52,48.61 121.52,48.61 110.35,54.38 85.87,69.23 81.00,103.96 80.43,104.48 77.26,105.74 77.26,105.78 Z"
                },
                {
                    id: 14,
                    data:
                        "M 79.75,114.88 C 77.50,137.19 101.56,126.94 101.56,126.94 101.56,126.94 100.81,126.00 100.81,126.00 100.81,126.00 104.06,126.75 104.06,126.75 104.06,126.75 102.12,129.31 102.12,129.31 102.12,129.31 101.94,128.19 101.94,128.19 101.94,128.19 76.38,138.75 78.56,114.94 78.17,114.68 75.89,113.70 75.91,111.74 75.94,109.77 77.43,108.38 79.17,108.43 80.29,108.43 82.57,109.43 82.57,111.48 82.77,113.55 81.60,115.12 79.75,114.88 Z"
                }
            ],
            thirdbrain: [
                {
                    id: 16,
                    data:
                        "M 26.91,29.18 C 27.84,29.95 30.46,34.09 30.96,34.69 30.85,35.40 29.93,36.56 29.84,37.09 28.59,37.25 23.89,37.78 22.91,38.00 23.07,37.07 26.31,30.93 26.91,29.18 Z"
                },
                {
                    id: 13,
                    data:
                        "M 63.44,107.91 C 61.04,105.13 48.19,44.88 29.82,37.09 29.99,36.66 30.96,35.02 31.00,34.73 45.62,38.36 58.32,81.03 65.81,105.78 66.45,108.33 74.52,107.11 74.58,107.11 74.63,107.11 76.82,104.62 76.82,104.62 77.24,104.71 78.49,105.71 78.68,105.93 78.87,106.15 76.45,108.57 76.31,108.76 76.78,109.06 78.33,110.78 78.60,111.05 78.55,111.52 77.62,112.47 77.49,112.69 77.14,112.69 74.44,110.13 74.44,110.11 74.44,109.95 65.84,110.68 63.44,107.91 Z"
                },
                {
                    id: 16,
                    data:
                        "M 130.74,50.35 C 130.89,50.69 132.34,58.09 132.30,58.39 131.80,58.28 126.25,57.83 125.74,57.70 125.51,57.60 124.99,55.51 124.91,55.17 124.84,54.84 130.05,50.93 130.74,50.35 Z"
                },
                {
                    id: 16,
                    data:
                        "M 15.00,49.82 C 14.85,52.52 14.64,58.38 14.64,59.73 15.91,59.13 18.78,56.26 20.12,56.03 20.02,55.61 20.11,54.03 20.16,53.59 20.16,53.14 16.65,50.94 15.00,49.82 Z"
                },
                {
                    id: 14,
                    data:
                        "M 89.53,117.04 C 90.81,117.42 91.11,116.01 92.69,116.16 94.26,116.31 95.22,120.72 95.22,121.62 95.22,122.52 93.06,123.30 93.00,124.18 92.95,125.05 93.81,128.56 93.87,129.13 94.17,129.76 96.80,129.98 97.04,130.58 97.29,131.18 97.46,134.74 97.49,135.53 97.52,136.33 95.52,136.72 95.58,138.00 95.63,139.28 95.57,142.18 97.42,143.11 98.57,143.38 99.07,142.40 100.51,142.31 101.96,142.23 104.92,143.97 105.49,144.02 106.06,144.08 105.94,146.44 106.49,146.96 107.03,147.47 111.61,147.41 112.18,147.22 112.75,147.03 113.42,145.47 114.02,144.73 114.81,144.52 119.74,145.01 120.18,145.07 120.61,145.12 119.19,143.51 119.00,143.04 118.81,142.58 126.05,146.12 126.38,145.84 126.71,145.57 119.79,149.62 119.47,149.62 119.14,149.62 119.98,147.52 120.20,147.22 118.62,147.41 115.27,147.46 113.98,147.36 113.98,147.36 112.95,145.48 112.24,144.93 111.54,144.39 107.89,144.36 107.18,144.20 106.47,144.03 104.92,146.19 104.62,146.27 104.32,146.35 99.19,145.23 99.02,144.22 98.86,143.21 99.50,142.33 99.42,141.51 99.23,140.88 97.83,141.93 97.80,137.51 97.55,137.08 95.50,136.63 95.09,136.22 94.68,135.81 94.32,131.46 94.29,131.00 94.26,130.53 96.46,129.68 96.62,128.78 96.79,127.88 95.77,124.25 95.71,123.60 95.65,122.94 93.18,123.35 92.69,122.31 92.20,121.27 92.03,119.63 90.29,118.13 89.61,117.07 90.65,115.74 90.13,114.98 89.02,113.53 84.82,114.07 84.82,114.07 84.82,114.07 84.71,112.53 84.71,112.15 84.71,111.77 84.75,111.81 84.72,110.88 86.59,110.91 93.81,111.04 96.25,114.00 98.27,114.71 101.72,132.50 103.59,137.00 105.47,141.50 118.23,139.66 117.97,140.03 117.92,140.35 117.99,141.87 117.98,142.28 118.70,141.94 125.87,138.69 125.05,138.42 124.22,138.16 118.69,136.03 117.73,135.80 117.84,136.41 117.93,137.46 118.02,137.80 116.97,137.84 108.92,138.73 105.62,135.06 105.14,133.22 100.25,113.17 98.38,112.53 97.23,110.73 90.64,107.73 84.59,108.06 84.66,106.91 84.07,105.30 82.24,105.40 80.45,105.40 79.20,107.22 79.22,107.82 79.25,108.42 79.32,111.77 79.29,112.04 79.26,112.32 79.27,117.57 79.38,117.66 79.59,118.46 80.54,119.14 82.00,119.09 82.00,119.09 82.02,117.91 82.02,117.91 81.48,117.91 80.77,117.58 80.51,117.07 80.38,117.00 80.33,113.02 80.33,113.02 80.33,113.02 83.40,113.02 83.40,113.02 83.40,113.02 83.48,117.02 83.35,117.09 83.23,117.46 82.77,117.92 82.02,117.91 82.02,117.91 82.00,119.09 82.00,119.09 83.75,119.10 84.57,117.85 84.67,117.36 84.62,116.40 88.11,117.47 89.53,117.04 Z"
                },
                {
                    id: 13,
                    data:
                        "M 80.09,102.47 C 80.09,102.47 81.25,104.56 81.25,104.56 81.25,104.56 84.78,103.00 84.78,103.00 84.78,103.00 85.94,106.25 85.94,106.25 85.94,106.25 88.47,105.47 88.47,105.47 88.47,105.47 86.89,101.36 87.06,101.38 90.44,79.93 101.74,63.11 125.65,57.78 125.65,57.78 124.93,55.88 124.91,55.17 111.59,57.08 88.44,69.58 84.28,100.78 83.21,101.18 80.09,102.47 80.09,102.47 Z"
                },
                {
                    id: 15,
                    data:
                        "M 77.14,117.03 C 76.30,116.62 76.28,114.56 75.72,114.53 75.16,114.50 70.74,114.38 70.16,114.50 69.57,114.62 68.37,116.82 67.62,116.59 66.88,116.37 62.61,114.19 62.62,113.88 62.64,113.56 63.62,111.05 63.50,110.81 63.38,110.58 60.63,107.35 60.31,107.00 60.00,106.65 57.07,106.28 57.00,106.06 56.93,105.84 56.25,101.43 56.34,101.12 56.44,100.83 58.42,98.98 58.41,98.84 58.39,98.71 57.06,93.93 56.91,93.81 56.75,93.70 53.62,92.86 53.56,92.72 53.51,92.57 51.84,87.80 51.84,87.59 51.84,87.38 53.86,85.16 53.78,85.03 53.70,84.90 52.08,80.21 51.84,80.09 51.61,79.98 48.25,79.72 48.16,79.56 48.07,79.41 46.02,74.96 46.06,74.69 46.10,74.41 47.62,72.00 47.50,71.84 47.38,71.69 44.68,67.39 44.47,67.31 44.26,67.23 41.44,67.42 41.31,67.34 41.18,67.27 37.80,63.65 37.75,63.44 37.70,63.23 38.59,60.21 38.44,60.06 38.28,59.92 34.49,57.19 34.22,57.19 33.95,57.19 30.94,58.57 30.81,58.50 30.68,58.43 26.32,56.93 26.22,56.72 26.11,56.51 25.54,53.59 25.28,53.53 25.02,53.48 20.14,53.39 20.12,53.56 20.11,53.73 20.07,55.89 20.09,56.06 20.12,56.23 24.42,56.34 24.97,56.28 25.51,56.23 27.24,54.19 27.59,54.22 27.95,54.25 32.25,55.93 32.50,56.34 32.75,56.75 31.74,58.74 32.28,59.31 32.83,59.89 36.05,62.19 36.59,62.44 37.14,62.68 39.78,61.06 40.19,61.47 40.60,61.88 43.38,64.96 43.62,65.56 43.87,66.16 41.98,68.49 42.25,68.84 42.52,69.20 44.79,72.57 45.06,73.03 45.34,73.50 48.18,72.74 48.53,73.28 48.89,73.83 50.80,77.25 50.94,78.09 51.07,78.94 48.83,80.56 48.97,81.16 49.10,81.76 50.74,85.09 51.09,85.72 51.45,86.35 54.13,86.17 54.59,86.72 55.06,87.26 56.15,90.45 56.31,91.84 56.47,93.24 54.06,93.65 54.25,94.66 54.44,95.67 55.22,98.44 55.44,99.25 56.31,100.12 58.75,100.05 58.97,100.62 59.18,101.20 60.17,104.65 60.06,105.69 59.95,106.72 57.22,107.51 57.62,108.41 58.03,109.31 60.44,112.82 61.09,113.12 61.75,113.42 63.73,111.25 64.62,111.66 65.52,112.07 68.61,113.59 69.09,114.00 69.59,114.41 69.63,116.74 69.91,117.12 70.18,117.51 75.06,117.48 75.69,117.34 76.31,117.21 76.04,114.07 77.19,114.05 78.33,114.02 79.27,114.00 79.27,114.00 79.27,114.00 79.33,117.03 79.33,117.03 79.33,117.03 77.93,117.15 77.14,117.03 Z"
                }
            ],
            complited71: false,
            icons: [
                {
                    icon: "test-img/icon13.png",
                    id: 13
                },
                {
                    icon: "test-img/icon14.png",
                    id: 14
                },
                {
                    icon: "test-img/icon15.png",
                    id: 15
                },
                {
                    icon: "test-img/icon16.png",
                    id: 16
                }
            ],
            draggetItem: null,
            question_71Width: 645,
            question_71Height: 1250
        };
    },
    watch: {
        complited71: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 71,
                    answer: [{ result: this.complited71 }]
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
    methods: {
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent71");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            var scale = 0.94;

            stage71.width(this.question_71Width * scale);
            stage71.height(this.question_71Height);
            stage71.scale({
                x: scale,
                y: scale
            });
            stage71.draw();
        },

        onStart() {
            let self = this;
            stage71 = new Konva.Stage({
                container: "question_71",
                width: this.question_71Width,
                height: this.question_71Height
            });

            var templayer71 = new Konva.Layer();
            var layer71 = new Konva.Layer();
            var group71 = new Konva.Group();
            var counter71 = 0;
            stage71.add(layer71);
            stage71.add(templayer71);
            var path71Front;

            var test77one;
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/71v2.png`,
                function(test77one) {
                    test77one.setAttrs({
                        x: 150,
                        y: 150,
                        scaleX: 0.75,
                        scaleY: 0.75,
                        name: "test77 first brain"
                    });
                    templayer71.add(test77one);
                    templayer71.batchDraw();
                }
            );
            var test77two;
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/71v2.png`,
                function(test77two) {
                    test77two.setAttrs({
                        x: 150,
                        y: 550,
                        scaleX: 0.75,
                        scaleY: 0.75,
                        name: "test77 second brain"
                    });
                    templayer71.add(test77two);
                    templayer71.batchDraw();
                }
            );
            var test77three;
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/71v2.png`,
                function(test77three) {
                    test77three.setAttrs({
                        x: 150,
                        y: 950,
                        scaleX: 0.75,
                        scaleY: 0.75,
                        name: "test77 the third brain"
                    });
                    templayer71.add(test77three);
                    templayer71.batchDraw();
                }
            );

            for (var i = 0; i < this.body71.length; i++) {
                path71Front = new Konva.Path({
                    x: 95,
                    y: 100,
                    fill: "#f5f5f5",
                    data: this.body71[i].data,
                    name: this.body71[i].needed_image,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25,
                    scaleX: 1.9,
                    scaleY: 1.9,
                    id: this.body71[i].id,
                   // fill: 'red',
                   // stroke: 'black',
                   // strokeWidth: 0.05,
                });
                layer71.add(path71Front);
            }

            for (var i = 0; i < this.secondbrain.length; i++) {
                path71Front = new Konva.Path({
                    x: 135,
                    y: 555,
                    fill: "#f5f5f5",
                    data: this.secondbrain[i].data,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25,
                    scaleX: 2.5,
                    scaleY: 2.5,
                    //stroke: 'black',
                    //strokeWidth: 0.05,
                    id: this.secondbrain[i].id
                });
                layer71.add(path71Front);
            }

            for (var i = 0; i < this.thirdbrain.length; i++) {
                path71Front = new Konva.Path({
                    x: 130,
                    y: 945,
                    fill: "#f5f5f5",
                    data: this.thirdbrain[i].data,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25,
                    scaleX: 2.5,
                    scaleY: 2.5,
                    //stroke: 'black',
                   // strokeWidth: 0.05,
                    id: this.thirdbrain[i].id
                });
                layer71.add(path71Front);
            }

            var signature;
            signature = new Konva.Text({
                x: 275,
                y: 250,
                draggable: false,
                fill: "black",
                text: "Xl пара"
            });
            group71.add(signature);
            signature.fontSize(22);
            signature.fontStyle("italic");
            signature = new Konva.Text({
                width: 65,
                height: 150,
                x: 400,
                y: 850,
                draggable: false,
                fill: "black",
                text: "Xll пара слева"
            });
            group71.add(signature);
            signature.fontSize(16);
            signature.fontStyle("italic");
            signature = new Konva.Text({
                width: 65,
                height: 200,
                x: 450,
                y: 1250,
                draggable: false,
                fill: "black",
                text: "верхняя, нижняя ветвь Vll пары слева"
            });
            group71.add(signature);
            signature.fontSize(14);
            signature.fontStyle("italic");

            var borderOfRect71;
            var dot71 = new Image();
            var dottedLine71 = new Image();
            var arrowRight71 = new Image();
            var chevroneRight71 = new Image();
            var line71 = new Image();
            for (var i = 0; i < this.icons.length; i++) {
                borderOfRect71 = new Konva.Rect({
                    cornerRadius: 5,
                    x: 0 + i * 130,
                    y: 5,
                    width: 118,
                    height: 54,
                    fill: "#f5f5f5",
                    stroke: "#e6e6e6",
                    strokeWidth: 1
                });
                group71.add(borderOfRect71);
            }
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon13.png`,
                function(line71) {
                    line71.setAttrs({
                        x: 47 + 390,
                        y: 32,
                        scaleX: 1.2,
                        scaleY: 1.2,
                        draggable: true,
                        name: "line",
                        id: 13
                    });
                    templayer71.add(line71);
                    templayer71.batchDraw();
                }
            );

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon14.png`,
                function(dot71) {
                    dot71.setAttrs({
                        x: 51,
                        y: 25,
                        scaleX: 1.2,
                        scaleY: 1.2,
                        draggable: true,
                        name: "Image dot",
                        id: 14
                    });
                    templayer71.add(dot71);
                    templayer71.batchDraw();
                }
            );

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon15.png`,
                function(dottedLine71) {
                    dottedLine71.setAttrs({
                        x: 41 + 130,
                        y: 32,
                        scaleX: 2,
                        scaleY: 5,
                        draggable: true,
                        name: "Image dotted line",
                        id: 15
                    });
                    templayer71.add(dottedLine71);
                    templayer71.batchDraw();
                }
            );
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/icon16.png`,
                function(arrowRight71) {
                    arrowRight71.setAttrs({
                        x: 49 + 260,
                        y: 25,
                        scaleX: 1.2,
                        scaleY: 1.2,
                        draggable: true,
                        name: "Image arrow right",
                        id: 16
                    });
                    templayer71.add(arrowRight71);
                    templayer71.batchDraw();
                }
            );

            borderOfRect71 = new Konva.Rect({
                cornerRadius: 5,
                x: 0,
                y: 70,
                width: 118,
                height: 54,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group71.add(borderOfRect71);
            var text71;
            text71 = new Konva.Text({
                x: 32,
                y: 92,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group71.add(text71);

            templayer71.add(group71);
            templayer71.draw();
            var targetPositionX;
            var targetPositionY;
            stage71.on("dragstart", function(e) {
                e.target.moveTo(templayer71);
                targetPositionX = e.target.attrs.x;
                targetPositionY = e.target.attrs.y;
                self.draggetItem = e.target.attrs.id;
                //console.log(targetPositionX)
                //console.log('Moving ' + e.target.name());
                layer71.draw();
            });

            var previousShape;
            stage71.on("dragmove", function(evt) {
                var pos = stage71.getPointerPosition();
                var shape = layer71.getIntersection(pos);
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
            stage71.on("dragend", function(e) {
                var pos = stage71.getPointerPosition();
                var shape = layer71.getIntersection(pos);
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
                }
                console.log(counter71);
                if (counter71 === 17) {
                    self.complited71 = true;
                    console.log(self.complited71);
                }
                previousShape = undefined;
                layer71.draw();
                templayer71.draw();
            });

            stage71.on("dragenter", function(e) {
                e.target.fill("red");
                layer71.draw();
            });

            stage71.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                layer71.draw();
            });

            stage71.on("dragover", function(e) {
                layer71.draw();
            });

            stage71.on("drop", function(e) {
                if (e.target.attrs.id === self.draggetItem) {
                    e.target.fill("black");
                    e.target.moveTo(templayer71);
                    counter71++;
                } else {
                    e.target.fill("#f5f5f5");
                }
                layer71.draw();
            });
            this.fitStageIntoParentContainer();
            text71.on("click", this.onStart);
            text71.on("tap", this.onStart);
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "71");
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

<style>
.drag,
.drop {
    display: inline-block;
}

.drop.allowed {
    background-color: #dfd;
}
</style>
