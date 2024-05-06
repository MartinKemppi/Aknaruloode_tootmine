# $\color{#1589F0}Aknaruloode tootmine$
Meie ettevõttes tootame aknarulood vastavalt kliendi tellimustele.

## $\color{#1589F0}Sisukord$
1. [Projekti kohta](https://github.com/MartinKemppi/Aknaruloode_tootmine?tab=readme-ov-file#color1589f0aknaruloode-pealeht)
2. [Tellimine](https://github.com/MartinKemppi/Aknaruloode_tootmine?tab=readme-ov-file#color1589f0aknaruloode-tellimine)
3. [Tellimuste valmistamine](https://github.com/MartinKemppi/Aknaruloode_tootmine?tab=readme-ov-file#color1589f0kuidas-valmistatakse-tellimust)
4. [Kasutajad](https://github.com/MartinKemppi/Aknaruloode_tootmine?tab=readme-ov-file#color1589f0kasutajad-ja-nende-lehed)
5. [Link](https://github.com/MartinKemppi/Aknaruloode_tootmine?tab=readme-ov-file#color1589f0lingid)
6. [Ülesanned](https://github.com/MartinKemppi/Aknaruloode_tootmine/blob/main/README.md#color1589f0%C3%BClesanned)

## $\color{#1589F0}Aknaruloode pealeht$
Pealel näeme toode näided, registreerimis võimalus ja sisse logimise võimalus.

![pilt](https://github.com/MartinKemppi/Aknaruloode_tootmine/assets/120181210/6cb408ef-e830-4293-83dd-b49737f4563e)

## $\color{#1589F0}Aknaruloode tellimine$

Logides sisse näeme vormi, kus saame valida: millist toodet te soovite ning vajutada "lisa tellimus" või tühistada seda.
![tellimine](https://github.com/MartinKemppi/Aknaruloode_tootmine/assets/120181210/e1e47651-36da-427e-b61e-29cca78fe2e4)


### $\color{#1589F0}Aknaruloode tellimuste vaatamine$

Punase ringiga on märgitud, et vajutame sinna ja näeme oma tellimused ja seisukord
![minutellimused](https://github.com/MartinKemppi/Aknaruloode_tootmine/assets/120181210/a4c99212-3978-43a9-bae6-cb95cb7b37e5)

##  $\color{#1589F0}Kuidas valmistatakse tellimust?$
Ettevõttes on osakonnad:
* riieosakond
* puuosakond
* komplekteerijad

### $\color{#1589F0}Riieosakond ja puuosakond$
Nad näevad tellimused ja valmistavad seda vastavalt tellimuste kirjeldusega. Valmistatud toode enda poolt nad märgivad, et toode on valmis (riie ja puu -osad on valmis).

### $\color{#1589F0}Komplekteerijad$
Näevad tellimused, mida peaks komplekteerida. **Komplekteerida võib ainult need tooded, _mis on valmis riieosakonna ja puuosakonna poolt_**.

##  $\color{#1589F0}Kasutajad ja nende lehed$

| Tavakasutaja  | Riieosakond | Puuosakond | Komplekteerijad | Admin |
| ------------- | ------------- | ------------- | ------------- | ------------- |
| Võib vormistada tellimust ja vaadata oma tellimust.  | Näeb tellitud toode, määrab valmis jah/ei.  | Näeb toode + riide valmis väli tabelis, määrab valmis jah/ei. | Näeb toode + riide valmis ja puu valmis väljad tabelis, määrab valmis jah/ei, kui on teiste osakonnade poolest on valmis.  | Võib kustutada tellimused ja näha tellimused. |
| Tellimine ja tellimuste vaatmise leht. | Riieosakonna tabeli leht. | Puuosakonna tabeli leht. | Komplekteerijate tabeli leht. | Admin tabeli leht. |

## $\color{#1589F0}Kood, mis näitab kasutajate tellimust$
```
<h3>Tellitud tooded</h3>
<div style="overflow-x: auto;">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Toode</th>
            <th>Seisukord</th>
        </tr>
        <?php
        global $yhendus;
        if (isset($_SESSION['kasutaja']) && $_SESSION['onAdmin'] == 0) {
            $kasutaja = $_SESSION['kasutaja'];
            $kask = $yhendus->prepare("SELECT tellimus.id, tellimus_nimi, rulood.mustrinr, tellimus.pakitud FROM tellimus INNER JOIN rulood ON tellimus.tellimus_nimi = rulood.id WHERE tellimus.kasutaja = ?");
            $kask->bind_param("s", $kasutaja);
            $kask->execute();
            $kask->bind_result($id, $tellimus_nimi, $mustrinr,$pakitud);
            while ($kask->fetch()) {
                echo "<tr>";
                $tellimus_nimi = htmlspecialchars($tellimus_nimi);
                echo "<td>" . $id . "</td>";
                echo "<td>" . $mustrinr . "</td>";
                echo "<td>" . ($pakitud == 1 ? 'Valmis kättesaadavaks' : 'Toode ei ole valmis') . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>
```
Siin me pöörame kasutajale, mis on logitud ja kontrollime seda andmebaasidega. Tulemused on esitatud tabelina.

## $\color{#1589F0}Lingid$
[Aknarulood](https://martinkemppi22.thkit.ee/content/Aknarulood/index.php)

## $\color{#1589F0}Ülesanned$
1. Lisa veel üks pilt pealehe.
2. Paigalda 4 pilti pealehes juurde.
3. Vaheta värvid sinistest - rohelisele.
4. Loo funktsioon, mis teeb järgmist: lisa tellimus vormis, kui oleme valinud mustri, siis vajutades lisa tellimus suunab meid näita minu tellimused.
5. Lisa tellimus nuppule määra roheline värv ja tühista punane.
6. Lisa pealehe all kuupäev.
