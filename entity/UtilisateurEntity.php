<?php

namespace entity;

class UtilisateurEntity
{
    protected $errormsg = [];

    public function __construct($donnees_u)
    {
        $this->hydrate($donnees_u);
    }

    public function hydrate($donnees_u)
    {
        foreach ($donnees_u as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setDatedenaissance_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setMotdepass_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        $value = password_hash($value, PASSWORD_DEFAULT);
        $this->setAttribut(__METHOD__, $value);
    }

    public function setMotdepass_u_conf($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        if (!$this->checkPassword($value)) {
            $this->errormsg[] = "Les passwords ne sont pas identiques.";
            return;
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setTelephone_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        if (strlen($value) != 10 ||  (((int) $value) == 0)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit contenir 10 chiffres.";
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setPostal_adresse_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        if ((((int) $value) == 0) || (strlen($value) != 5)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit contenir 5 chiffres.";
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setVille_adresse_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        if (strlen($value) < 2) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit contenir minimum 2 caractères.";
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setNom_rue_adresse_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        if (strlen($value) < 2) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit contenir minimum 2 caractères.";
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setNumero_rue_adresse_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }

        if (((int) $value) == 0) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être un chiffre.";
            return;
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setLogin_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setNom_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setPrenom_u($value)
    {
        if (empty($value)) {
            $this->errormsg[] = "Le champ {$this->getVariableName(__METHOD__)} doit être renseigné.";
            return;
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function setMail_u($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL) || empty($value)) {
            $this->errormsg[] = "{$this->getVariableName(__METHOD__)} {$value} est invalide.";
            return;
        }
        $this->setAttribut(__METHOD__, $value);
    }

    public function checkPassword($password)
    {
        if (password_verify($password, $this->motdepass_u)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Generic function to set attribut depending of setter name
     */
    public function setAttribut(string $setter, $value)
    {
        $attribut = strtolower(str_replace(__CLASS__ . '::', '', str_replace('set', '', $setter)));
        $this->$attribut = $value;
    }

    /**
     * Get variable name using setter name
     */
    public function getVariableName(string $setter)
    {
        $attribut = str_replace(__CLASS__ . '::', '', str_replace('set', '', $setter));
        return str_replace('_', ' ', str_replace('_u', '', $attribut));
    }

    /** 
     * Check if user data are correct 
     */
    public function checkData()
    {
        if (empty($this->errormsg)) {
            $this->concatenateAdress();
            return TRUE;
        } else {
            return $this->errormsg;
        }
    }

    /**
     * Concatenate adress fields
     */
    public function concatenateAdress()
    {
        $this->adresse_u = $this->numero_rue_adresse_u;
        $this->adresse_u .= ' ' . $this->nom_rue_adresse_u;
        $this->adresse_u .= ' ' . $this->ville_adresse_u;
        $this->adresse_u .= ' ' . $this->postal_adresse_u;
    }
}
