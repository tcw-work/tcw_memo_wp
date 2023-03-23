"use strict";

require("./css/common/functional_parts/reset.css");

require("./css/common/functional_parts/variable.css");

require("./css/base.css");

require("./css/common/header.css");

require("./css/common/side.css");

require("./css/parts/card.css");

require("./css/article/article.css");

require("./css/common/footer.css");

var _module = _interopRequireDefault(require("./modules/module.js"));

var _module_next = _interopRequireDefault(require("./modules/module_next.js"));

var _function = _interopRequireDefault(require("./modules/function.js"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

(0, _module["default"])();
(0, _module_next["default"])();
(0, _function["default"])(); // import codepen from 'https://cpwebassets.codepen.io/assets/embed/ei.js';
// codepen();
// const hello = () => {
//     console.log("hello");
// };
// hello();