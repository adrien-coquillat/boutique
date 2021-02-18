<?php

namespace library;

class FileHandeler
{
    public function upload()
    {
        $errormsg = [];
        $fileName =  basename($_FILES["fileToUpload"]['name']);
        $fileFinalPath = "public/img/" . $fileName;
        $fileExt = strtolower(pathinfo($fileFinalPath, PATHINFO_EXTENSION));
        if (!getimagesize($_FILES["fileToUpload"]["tmp_name"])) {
            $errormsg[] = 'File is not an image';
        }
        if (file_exists($fileFinalPath)) {
            $errormsg[] = 'File with identical name already exists in target directory.';
        }
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            $errormsg[] = 'File is to large to be upload, 5 Mo max allowed.';
        }
        if ($fileExt != "jpg" && $fileExt != "png" && $fileExt != "jpeg" && $fileExt != "gif") {
            $errormsg[] =  'File types allowed are only JPG, JPEG, PNG & GIF, ' . strtoupper($fileExt)  . 'provided.';
        }
        if (empty($errormsg)) {
            if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileFinalPath)) {
                $errormsg[] =  "Error occured when file was uploaded";
            }
        }
        if (!empty($errormsg)) {
            return $errormsg;
        } else {
            return TRUE;
        }
    }

    public function edit($data)
    {
        $oldfile = $data['path'] . $data['oldFile'];
        $newfile = $data['path'] . $data['file'];


        if (!rename($oldfile, $newfile)) {
            $msg = "Error occured when trying to rename $oldfile in $newfile.";
        } else {
            return TRUE;
        }
    }

    public function delete($data)
    {
        $file = $data['path'] . $data['oldFile'];
        if (!unlink($file)) {
            $msg = "Error occured when trying to delete $file.";
        } else {
            return TRUE;
        }
    }
}
