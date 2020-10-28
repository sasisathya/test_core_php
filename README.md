# test_core_php
dump the user_curd sql in db and then set the path and db connections in conn.php file and open display.php file 
 and the laravel orm for the query

SELECT * FROM `a_loans` WHERE ( (`loan_repay_date` BETWEEN '2020-09-19' and '2020-10-19' AND `loan_repay_extended_date` IS NULL) OR (`loan_repay_extended_date` BETWEEN '2020-09-19' and '2020-10-19') )

ALoans::where(function ($query) use($start,$end){
    $query->whereBetween('loan_repay_date', [$start, $end])
        ->whereNull('loan_repay_extended_date');
})->orWhere(function($query) {
    $query->whereBetween('loan_repay_extended_date', [$start, $end]);	
});
