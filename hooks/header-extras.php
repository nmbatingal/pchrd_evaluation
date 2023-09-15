<script src="<?php echo PREPEND_PATH; ?>hooks/table2CSV-master/table2CSV.js"></script>
<script>
    $j(document).ready(function () {
        $j('.reportsTable').each(function () {
            var $table = $j(this);
            var $tableID = $j(this).attr('id');

            var $button = $j("<button type='button'>");
            $button.text("Export to spreadsheet");
            $button.insertAfter($table);

            $button.click(function () {
                var csv = $table.table2CSV({
                    delivery: 'value'
                });
                downloadFile($tableID + '.csv', 'data:text/csv;charset=UTF-8,' + encodeURIComponent(csv));
            });
        });
    })

    function downloadFile(fileName, urlData)
    {
        var aLink = document.createElement('a');
        aLink.download = fileName;
        aLink.href = urlData;
        document.body.appendChild(aLink);
        aLink.click();
        document.body.removeChild(aLink);
    }
</script>