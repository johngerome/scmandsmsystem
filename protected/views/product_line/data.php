
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="352">Name</th>
                                    <th width="174" ># Items</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php foreach($qry_product_line as $row): ?>
                                  <tr>
                                    <td  align="left"><?php echo $row->ProductLineId ?></td>
                                    <td ><b><?php echo $row->ProductLineName ?></b></td>
                                    <td ><?php echo $this->product_line_model->get_product_line_quantity_byID($row->ProductLineId) ?></td>
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->ProductLineId ?>" onclick="edit_data('<?php echo $row->ProductLineId ?>','product_line')" title="Edit" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->ProductLineId ?>" class="delete_product_line"  name="<?php echo $row->ProductLineName ?>" title="Delete"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_delete.png" />
                                          </a>
                                      </span> 
                                      </td>
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>
