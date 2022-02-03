<?php

require_once 'Repository.php';

class StatisticRepository extends Repository
{

    private function insertLackingMoths($data): array {
        $fullData = [];
        foreach (range(1,12) as $month) {
            $fullData[] = $data[$month] == null ? 0.0 : $data[$month];
        }
        return $fullData;
    }

    public function getIncomeVsExpenditures(int $userId): array {
        $stmt = $this->database->connect()->prepare('
          select sum(amount)
            from transaction t join category c on c.category_id = t.category_id
                   join user_account ua on ua.user_id = c.user_id
            where c.user_id= :userId
            and amount < 0
            and DATE_PART(\'month\', t.create_time) = DATE_PART(\'month\', CURRENT_DATE);
        ');


        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $expenditures = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
          select sum(amount)
            from transaction t join category c on c.category_id = t.category_id
                   join user_account ua on ua.user_id = c.user_id
            where c.user_id= :userId
            and amount > 0
            and DATE_PART(\'month\', t.create_time) = DATE_PART(\'month\', CURRENT_DATE);
        ');


        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $income = $stmt->fetch(PDO::FETCH_ASSOC);


        return [
            'INCOME' => (float) $income['sum'],
            'EXPENDITURES' => (float) $expenditures['sum'] * -1
        ];
    }

    public function getExpendituresByMonth(int $userId): array
    {
        $stmt = $this->database->connect()->prepare('
             select sum(amount), DATE_PART(\'month\', t.create_time)  as "MONTH"
                from transaction t join category c on c.category_id = t.category_id
                join user_account ua on ua.user_id = c.user_id
                where c.user_id= :userId and t.amount < 0
                and DATE_PART(\'year\', t.create_time) = DATE_PART(\'year\', CURRENT_DATE)
                group by DATE_PART(\'month\', t.create_time);
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [];

        foreach ($result as $item) {
            $data[$item["MONTH"]] = (float) $item["sum"] * -1;
        }

        return $this->insertLackingMoths($data);
    }

    public function getExpendituresByCategory(int $userId): array
    {
        $stmt = $this->database->connect()->prepare('
             select c.name, sum(amount)
                    from transaction t join category c on c.category_id = t.category_id
                   join user_account ua on ua.user_id = c.user_id
                    where c.user_id= :userId
                    and amount < 0
                    and DATE_PART(\'month\', t.create_time) = DATE_PART(\'month\', CURRENT_DATE)
                        group by c.category_id;
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [];

        foreach ($result as $item) {
            $data[$item["name"]] = (float) $item["sum"] * -1;
        }

        return $data;
    }


}