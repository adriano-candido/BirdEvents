<?php

namespace Nucleo;

class EntidadeDAO {

    private $entidade;
    private $dadosEntidade;
    private $nomeEntidade;
    private $nomeClasse;
    private $atributos = [];

    public function __construct(Entidade $entidade) {
        $this->dadosEntidade = new \ReflectionClass($entidade);
        $this->nomeEntidade = substr($this->dadosEntidade->getName(), strlen('App\\Modelos\\'));
        $this->mudarEntidade($this->nomeEntidade);
    }

    public function mudarEntidade($entidade) {
        $classeEntidade = 'App\\Modelos\\' . ucfirst($entidade);

        $this->entidade = new $classeEntidade();
        $this->dadosEntidade = new \ReflectionClass($this->entidade);
        $this->nomeClasse = $this->dadosEntidade->getName();
        $this->nomeEntidade = strtolower($entidade);

        $this->atributos = [];

        foreach ($this->dadosEntidade->getProperties() as $atributo) {
            if (!is_array($this->entidade->get($atributo->getName()))) {
                $this->atributos[] = $atributo->getName();
            }
        }

        return $this;
    }

    public function salvar(Entidade $entidade) {
        if ($entidade->getId() > 0) {
            $this->editar($entidade);
        } else {

            return $this->adicionar($entidade);
        }
    }

    public function adicionar(Entidade $entidade) {

        $sql = "INSERT INTO " . $this->nomeEntidade . " (";
        $campos = '';
        $valores = '';

        for ($i = 0; $i < count($this->atributos); $i++) {
            $atributo = $this->atributos[$i];

            $campos = $campos . $atributo;
            $valores = $valores . ":" . $atributo;

            if ($i == count($this->atributos) - 1) {
                $campos = $campos . " ) VALUES ( ";
                $valores = $valores . " ) ; ";
            } else {
                $campos = $campos . ",";
                $valores = $valores . ",";
            }
        }

        $sql = $sql . $campos . $valores;

        $consulta = DB::getConexao()->prepare($sql);

        $valor;

        for ($i = 0; $i < count($this->atributos); $i++) {
            $atributo = $this->atributos[$i];

            $valor = $entidade->get($atributo);

            if ($entidade->get($atributo) instanceof Entidade) {
                $valor = $entidade->get($atributo)->getId();
            }
            $consulta->bindValue(":" . $atributo, $valor);
        }

        $consulta->execute();

        return DB::getConexao()->lastInsertId();
    }

    public function editar(\Nucleo\Entidade $entidade) {

        $sql = "UPDATE " . $this->nomeEntidade . " SET ";
        for ($i = 0; $i < count($this->atributos); $i++) {
            $atributo = $this->atributos[$i];
            if ($atributo !== 'id') {
                $sql = $sql . $atributo . " = :" . $atributo;
                if ($i !== count($this->atributos) - 1) {
                    $sql = $sql . ", ";
                }
            }
        }
        $sql = $sql . " WHERE id = :id ";

        $consulta = DB::getConexao()->prepare($sql);

        $valor;

        for ($i = 0; $i < count($this->atributos); $i++) {
            $atributo = $this->atributos[$i];

            $valor = $entidade->get($atributo);

            if ($entidade->get($atributo) instanceof Entidade) {
                $valor = $entidade->get($atributo)->getId();
            }
            $consulta->bindValue(":" . $atributo, $valor);
        }

        $consulta->execute();
    }

    public function pesquisarPorNome($nome) {

        $consulta = DB::getConexao()->prepare("SELECT * FROM " . $this->nomeEntidade . " WHERE nome LIKE :nome ;");
        $consulta->bindValue(':nome', '%' . $nome . '%');

        $consulta->execute();

        $resultados = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        return $this->montaEntidade($resultados);
    }

    public function pesquisarPorId($id) {
        $consulta = DB::getConexao()->prepare("SELECT * FROM " . $this->nomeEntidade . " WHERE id=:id;");
        $consulta->bindValue(':id', $id);

        $consulta->execute();

        $resultados = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        return $this->montaEntidade($resultados)[0];
    }

    public function excluir($id) {
        $consulta = DB::getConexao()->prepare("DELETE FROM " . $this->nomeEntidade . " WHERE id=:id;");

        $consulta->bindValue(':id', $id);

        $consulta->execute();
    }

    public function pesquisarOnde($campo, $valor) {
        $consulta = DB::getConexao()->prepare("SELECT * FROM " . $this->nomeEntidade . " WHERE $campo = :valor;");
        $consulta->bindValue(':valor', $valor);


        $consulta->execute();

        $resultados = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        return $this->montaEntidade($resultados);
    }

    public function pesquisarBETWEEN($campo, $minimo, $maximo) {
        $consulta = DB::getConexao()->prepare("SELECT * FROM " . $this->nomeEntidade . " WHERE $campo BETWEEN :minimo AND :maximo;");
        $consulta->bindValue(':minimo', $minimo);
        $consulta->bindValue(':maximo', $maximo);


        $consulta->execute();

        $resultados = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        return $this->montaEntidade($resultados);
    }

    public function pesquisarLIKE($campo, $valor) {

        $consulta = DB::getConexao()->prepare("SELECT * FROM " . $this->nomeEntidade . " WHERE :campo LIKE :valor ;");
        $consulta->bindValue(':campo', $campo);
        $consulta->bindValue(':valor', '%' . $valor . '%');


        $consulta->execute();

        $resultados = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        return $this->montaEntidade($resultados);
    }

    public function pesquisarIN($campo, $valores) {
        $sql = "SELECT * FROM " . $this->nomeEntidade . " WHERE " . $campo . " IN (";

        foreach ($valores as $chave => $valor) {
            $sql = $sql . " :" . $chave . ",";
        }

        $sql = substr($sql, 0, strlen($sql) - 1);

        $sql = $sql . ");";

        $consulta = DB::getConexao()->prepare($sql);

        foreach ($valores as $chave => $valor) {
            $consulta->bindValue(":$chave", $valor);
        }

        $consulta->execute();

        $resultados = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        return $this->montaEntidade($resultados);
    }

    public function pesquisarLIVRE($sqlLivre, $valores) {
        $sql = "SELECT * FROM " . $this->nomeEntidade . " " . $sqlLivre;

        $sqlQuebrada = explode($sql, ':');
        foreach ($sqlQuebrada as $chave => $valor) {
            $sqlQuebrada[$chave] = str_replace(":", " :" . $chave, $valor);
        }

        if (count($sqlQuebrada) > 1) {
            $sql = implode(':', $sqlQuebrada);
        }


        $consulta = DB::getConexao()->prepare($sql);

        foreach ($valores as $chave => $valor) {
            $consulta->bindValue(":$chave", $valor);
        }
       
        $consulta->execute();

        $resultados = $consulta->fetchAll(\PDO::FETCH_ASSOC);

        return $this->montaEntidade($resultados);
    }

    private function montaEntidade($listaResultados) {
        $objetos = [];

        foreach ($listaResultados as $resultado) {
            $objeto = new $this->nomeClasse();
            foreach ($this->atributos as $atributo) {
                if (property_exists($this->entidade, 'mapa') && array_key_exists($atributo, $this->entidade->getMapa())) {

                    $classeInterna = 'App\\Modelos\\' . ucfirst($atributo);
                    $classeInterna = new $classeInterna();
                    $dao = new EntidadeDAO($classeInterna);
                    $classeInterna = $dao->pesquisarPorId($resultado[$atributo]);
                    $resultado[$atributo] = $classeInterna;
                }
                $objeto->set($atributo, $resultado[$atributo]);
            }
            $objetos[] = $objeto;
        }
        return $objetos;
    }

}
