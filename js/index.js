import header from './modules/components/header.configs.js'
import accManager from './modules/components/acc-manager.configs.js'
import productPreview from './modules/components/product-preview.configs.js'


$(document).ready(function(){
  header.init()
  accManager.init()
  productPreview.init()
})
