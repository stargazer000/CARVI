<?php
$pdo = new PDO('mysql:host=localhost;dbname=carvi;charset=utf8', 'root', '');

print'PDO クラスによる接続に成功しました。';


$search_key = $_GET['code'];

try {
    $sql = "SELECT * FROM outline WHERE code like :code";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':code', $search_key, PDO::PARAM_STR);
    $stmh->execute();
    $count = $stmh->rowCount();
    print $count;
} catch (PDOException$Exception) {
    print $Exception->getMessage();
}
if ($count < 1) {
    print 0;
} else {
    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td align="center"><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['sent_at']) ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['body']) ?></td>
            <td align="center"><?= htmlspecialchars($row['code']) ?></td>
        </tr>
        <?php
        try {
            $sql = "SELECT * FORM media WHERE outline_id = :outline_id";
            $stmh1 = $pdo->prepare($sql);
            $stmh1->bindValue('outline_id', $row['id'], PDO::PARAM_INT);
            $stmh1->execute();
            $count = $stmh1->rowCount();
            print $count;
        } catch (PDOException$Exception) {
            print $Exception->getMessage();
        }
        if ($count < 1) {
            print 0;
        } else {
            while ($row1 = $stmh1->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td align="center"><?= htmlspecialchars($row1['id']) ?></td>
                    <td><?= htmlspecialchars($row1['minetype']) ?></td>
                    <td><?= htmlspecialchars($row1)['filepath'] ?></td>
                    <td><?= htmlspecialchars($row1)['attributes'] ?></td>
                    <td align="center"><?= htmlspecialchars($row1)['outline_id'] ?></td>
                </tr>
                }
                }
                }
                ?>
                </tbody></table>

                <?php
            }
        }
    }
}

            