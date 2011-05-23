<?php
class DzJqmodalFilter extends sfFilter {
  
 /**
   * Executes this filter.
   *
   * @param sfFilterChain $filterChain The filter chain.
   *
   * @throws <b>sfInitializeException</b> If an error occurs during view initialization
   * @throws <b>sfViewException</b>       If an error occurs while executing the view
   */
  public function execute($filterChain) {
    $response = $this->context->getResponse();
    $old = $response->getContent();
    $new = str_ireplace('</body>', "\n".$this->getContent()."\n</body>", $old); 
    $response->setContent($new);
    $filterChain->execute();
  }
  
  public function getContent() {
    return '<div id="modal"></div>';
  }
  
  
}