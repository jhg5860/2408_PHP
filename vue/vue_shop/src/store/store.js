//  store.js 기본 형태
// import { createStore } from 'vuex';

// export default createStore({
//     modules: {

//     },
// });

import { createStore } from 'vuex';
import board from './modules/board.js';

export default createStore({
    modules: {
        board
    },
});