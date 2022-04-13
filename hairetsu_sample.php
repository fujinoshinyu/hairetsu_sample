<?php 
    /**
     * id: 社員ID
     * name: 名前
     * job: 職種
     * manager: 上司の社員ID
     * sal: 給与
     * dept: 部門コードphp
     */

use SebastianBergmann\CodeCoverage\Driver\PHPDBG;

$employees = [
        ['id'=>7369, 'name'=>'SMITH', 'job'=>'CLERK', 'manager'=>7902, 'sal'=>800, 'dept'=>20],
        ['id'=>7499, 'name'=>'ALLEN', 'job'=>'SALESMAN', 'manager'=>7698, 'sal'=>1600, 'dept'=>30],
        ['id'=>7521, 'name'=>'WARD', 'job'=>'SALESMAN', 'manager'=>7698, 'sal'=>1250, 'dept'=>30],
        ['id'=>7566, 'name'=>'JONES', 'job'=>'MANAGER', 'manager'=>7839, 'sal'=>2975, 'dept'=>20],
        ['id'=>7654, 'name'=>'MARTIN', 'job'=>'SALESMAN', 'manager'=>7698, 'sal'=>1250, 'dept'=>30],
        ['id'=>7698, 'name'=>'BLAKE', 'job'=>'MANAGER', 'manager'=>7839, 'sal'=>2850, 'dept'=>30],
        ['id'=>7782, 'name'=>'CLARK', 'job'=>'MANAGER', 'manager'=>7839, 'sal'=>2450, 'dept'=>10],
        ['id'=>7788, 'name'=>'SCOTT', 'job'=>'ANALYST', 'manager'=>7566, 'sal'=>3000, 'dept'=>20],
        ['id'=>7839, 'name'=>'KING', 'job'=>'PRESIDENT', 'manager'=>null, 'sal'=>5000, 'dept'=>10],
        ['id'=>7844, 'name'=>'TURNER', 'job'=>'SALESMAN', 'manager'=>7698, 'sal'=>1500, 'dept'=>30],
        ['id'=>7876, 'name'=>'ADAMS', 'job'=>'CLERK', 'manager'=>7788, 'sal'=>1100, 'dept'=>20],
        ['id'=>7900, 'name'=>'JAMES', 'job'=>'CLERK', 'manager'=>7698, 'sal'=>950, 'dept'=>30],
        ['id'=>7902, 'name'=>'FORD', 'job'=>'ANALYST', 'manager'=>7566, 'sal'=>3000, 'dept'=>20],
        ['id'=>7934, 'name'=>'MILLER', 'job'=>'CLERK', 'manager'=>7782, 'sal'=>1300, 'dept'=>10],
    ];

    //給与の平均値
    $sal_datas = [];
    foreach($employees as $employee){
        $sal_datas[] = $employee['sal'];
    }
    $sal_avg = array_sum($sal_datas) / count($sal_datas);
    echo "[給与平均]".PHP_EOL;
    echo round($sal_avg) ."円".PHP_EOL;

    echo "===============================".PHP_EOL;

    //給与の中央値
    sort($sal_datas);
    if(count($sal_datas) % 2 == 0){
        echo "[中央値]".PHP_EOL;
        echo round(($sal_datas[(count($sal_datas)/2)-1]+$sal_datas[((count($sal_datas)/2))])/2)."円".PHP_EOL;
    }else{
        echo "[中央値]->".PHP_EOL;
        echo round($sal_datas[floor(count($sal_datas)/2)])."円".PHP_EOL;
    }

    echo "===============================".PHP_EOL;

    //給与の多い順
    rsort($sal_datas);
    $rank = 1;
    echo "[給与の多い順]".PHP_EOL;
    foreach($sal_datas as $sal_data){ 
        echo $rank."位は".$sal_data."円".PHP_EOL;
        $rank++;
    }

    echo "===============================".PHP_EOL;

    //職種ごとの社員数
    $job_datas = [];
    foreach($employees as $employee){
        $job_datas[] = $employee['job'];
    }

    $job_count_datas = array_count_values($job_datas);
    echo "[職種ごとの人数]".PHP_EOL;
    foreach($job_count_datas as $job_name => $job_count_data){
        echo $job_name."の人数は".$job_count_data."人".PHP_EOL;
    }

    echo "===============================".PHP_EOL;

    //職種ごとの給与平均値
    echo "[職種ごとの平均給与]".PHP_EOL;
    $job_sal_sum_datas =  [];
    foreach($employees as $employee){
        $employee_job = $employee['job'];
        $employee_sal = $employee['sal'];
        $job_sal_sum_datas[$employee_job] += $employee_sal;
    }

    foreach($job_sal_sum_datas as $job_name => $job_sal_sum_data){
        echo $job_name ."の平均給与は".$job_sal_sum_datas[$job_name]."円".PHP_EOL;
    }

    echo "===============================".PHP_EOL;
