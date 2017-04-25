
<?php
require_once('assets/plugin/mpdf/mpdf.php');

$mpdf = new mPDF();

$stylesheet = file_get_contents(URL . 'assets/css/pdf.css');

$mpdf->WriteHTML($stylesheet,1);




 $str =   '<article>
            <div class="panel panel-default panel-question">
                <div class="panel-heading panel-detail">
                    <h1>'. $this->data['exam']['name'] . '</h1>
                    <p>Ngày tạo : '. $this->data['exam']['date'] . '</p>
                    <p>Môn : ' . $this->data['exam']['name_type'] . '</p>
                     <p>Thời gian : ' . $this->data['exam']['time'] .' phút</p>
                </div>
                <div class="panel-body preview-question">';
                    foreach($this->data['data'] as $row ) { 
                    $str .= '<section >
                        <h4><strong> ' . $row['question']['name'] .' :</strong> ' . $row['question']['content'] . '
                        </h4>
                        <table>';
                            $alpha = 65; 
                            foreach($row['answer'] as $answer) { 
                            $str .= '
                            <tr>
                                <td>
                                    ('. chr($alpha + 256) .') 
                                </td>
                                <td>
                                    '. $answer['content'] .'
                                </td>
                            </tr>
                            ';
                            
                            $alpha++; 
                            }
                        $str .= '
                        </table>
                    </section>';
                    }
            $str .= '
                </div>
            </div>
        </article>';
$mpdf->WriteHTML($str, 2);

$mpdf->Output();

