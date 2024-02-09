<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required|max:20',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'accept_terms' => 'required',
            //'file' => 'image',
            //'file' => 'file|mimes:jpeg,png,gif,mp4,avi|max:10240', // Agrega la regla max para limitar el tamaño a 10MB
        ];

        if ($post) {
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        if ($this->status == 2){
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required|array|min:5',
                'extract' => 'required',
                'body' => 'required',
                'file' => 'required|file',
                'accept_terms' => 'required',
            ]);
        }

        // Verificar si el archivo es una imagen o un video
        // $fileMimeType = $this->file('file')->getMimeType();
        // if (strpos($fileMimeType, 'image') !== false) {
        //     // Es una imagen
        //     $rules['file'] .= '|mimes:jpeg,png,gif|max:5120';
        // } elseif (strpos($fileMimeType, 'video') !== false) {
        //     // Es un video
        //     $rules['file'] .= '|mimes:mp4,avi|max:10240';
        // }

        // Verificar si el campo 'file' está presente y es un archivo
        if ($this->hasFile('file')) {
            $file = $this->file('file');
            
            // Verificar si el archivo es una imagen o un video
            $fileMimeType = $file->getMimeType();
            
            if (strpos($fileMimeType, 'image') !== false) {
                // Es una imagen
                $rules['file'] = 'required|file|mimes:jpeg,png,gif|max:5120';
            } elseif (strpos($fileMimeType, 'video') !== false) {
                // Es un video
                $rules['file'] = 'required|file|mimes:mp4,avi|max:10240';
            }
        } else {
            // Si el campo 'file' no está presente, aplicar la regla de requerido
            $rules['file'] = 'required|file';
        }

        return $rules;
    }
}
