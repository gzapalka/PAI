<?php

require_once __DIR__ . '/../repository/StatisticRepository.php';
require_once __DIR__ . '/../controllers/util/SessionUtil.php';
require_once __DIR__ . '/Jpgraph/src/jpgraph.php';
require_once __DIR__ . '/Jpgraph/src/jpgraph_bar.php';
require_once __DIR__ . '/Jpgraph/src/jpgraph_pie.php';

class StatisticController
{
    private StatisticRepository $statisticRepository;
    private SessionUtil $sessionUtil;

    public function __construct()
    {
        $this->statisticRepository = new StatisticRepository();
        $this->sessionUtil = new SessionUtil();
    }

    public function getExpendituresPerMonth() {
        try {
            $userId = $this->sessionUtil->getLoggedUser();
        } catch (NoSuchUserException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/login");
            return null;
        }
        $data = $this->statisticRepository->getExpendituresByMonth($userId);
        return $this->generateExpendituresPerMonthGraph($data);
    }

    public function getIncomeVsExpenditures() {
        try {
            $userId = $this->sessionUtil->getLoggedUser();
        } catch (NoSuchUserException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/login");
            return null;
        }
        $data = $this->statisticRepository->getIncomeVsExpenditures($userId);
        return $this->generateIncomeVsExpenditureGraph($data);
    }

    public function getExpendituresPerCategory() {
        try {
            $userId = $this->sessionUtil->getLoggedUser();
        } catch (NoSuchUserException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: $url/login");
            return null;
        }
        $data = $this->statisticRepository->getExpendituresByCategory($userId);
        return $this->generateExpendituresByCategory($data);
    }

    private function generateExpendituresByCategory($data) {
        $graph = new PieGraph(500,250);
        $graph->SetShadow();
        $graph->title->Set("Expenditures per category");

        $dataY = [];
        foreach ($data as $item) {
            $dataY [] = $item;
        }
        $p1 = new PiePlot($dataY);

        $legends = [];
        foreach (array_keys($data) as $array_key) {
            $legends[] = $array_key . ' (%d)';
        }
        $p1->SetLegends($legends);

        $graph->Add($p1);
        $img = $graph->Stroke(_IMG_HANDLER);
        ob_start();
        imagepng($img);
        $imageData = ob_get_contents();
        ob_end_clean();

        return $imageData;
    }

    private function generateIncomeVsExpenditureGraph($data) {
        $graph = new PieGraph(500,250);
        $graph->SetShadow();

        $graph->title->Set("Income vs Expenditures");


        $p1 = new PiePlot([$data['INCOME'], $data['EXPENDITURES']]);
        $legends = array('Income (%d)','Expenditures (%d)');
        $p1->SetLegends($legends);

        $graph->Add($p1);
        $img = $graph->Stroke(_IMG_HANDLER);
        ob_start();
        imagepng($img);
        $imageData = ob_get_contents();
        ob_end_clean();

        return $imageData;
    }

    private function generateExpendituresPerMonthGraph($data) {

        $graph = new Graph(350,400,'auto');
        $graph->SetScale("textlin");

        $theme_class=new PastelTheme();
        $graph->SetTheme($theme_class);

        $graph->SetBox(false);
        $graph->ygrid->SetFill(false);
        $b1plot = new BarPlot($data);

        $gbplot = new GroupBarPlot(array($b1plot));
        $graph->Add($gbplot);
        $b1plot->SetFillColor("#244564");
        $graph->title->Set("Expenditures per moths");

        $img = $graph->Stroke(_IMG_HANDLER);
        ob_start();
        imagepng($img);
        $imageData = ob_get_contents();
        ob_end_clean();

        return $imageData;
    }
}