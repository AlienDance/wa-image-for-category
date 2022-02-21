<?php


class shopImageForCategoryPlugin extends shopPlugin {
    public function categoryDialog($category) {
        $html = '
        <div class="field-group">
            <div class="field category_image">
                <div class="name">Category Image</div>
                <div class="value">
                    <input type="file" name="category_image" accept="image/png, image/jpeg">
                </div>
            </div>
        </div>';
        return $html;
    }

    public function categorySave($category) {

        $imageFile = waRequest::file('category_image');

        if ($imageFile) {

            $imageType = $imageFile->waImage()->getExt();
            $imageName = $category['id'] . '.' . $imageType;

            $model = new shopImageForCategoryModel();
            $model->updateById($category['id'], array('image_reference' => $imageName));

            $imageFile->waImage()->save(__DIR__ . './../saved-images/' . $imageName);
        }
    }

    public function categoryDelete($category) {
        waFiles::delete(__DIR__ . './../saved-images/' . $category['image_reference']);
    }

    public function frontendCategory($category) {
        $html = '<img src="' . $this->getCategoryImageReference($category['id']) . '">';
        return $html;
    }

    public function backendProducts() {
    }

    public function getCategoryImageReference($categoryId) {

        $model = new shopImageForCategoryModel();
        $result = $model->getById($categoryId);

        return $result['image_reference'];
    }
}
